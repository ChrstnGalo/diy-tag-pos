 <?php

    defined("ABSPATH") ? "" : die();

    //capture ajax data
    $raw_data = file_get_contents("php://input");
    if (!empty($raw_data)) {

        $OBJ = json_decode($raw_data, true);
        if (is_array($OBJ)) {
            if ($OBJ['data_type'] == "search") {

                $productClass = new Product();
                $limit = 20;

                if (!empty($OBJ['text'])) {
                    //search
                    $barcode = $OBJ['text'];
                    $text = "%" . $OBJ['text'] . "%";
                    $query = "select * from products where description like :find || barcode = :barcode order by views desc limit $limit";
                    $rows = $productClass->query($query, ['find' => $text, 'barcode' => $barcode]);
                } else {
                    //get all
                    //$limit = 10,$offset = 0,$order = "desc",$order_column = "id"
                    $rows = $productClass->getAll($limit, 0, 'desc', 'views');
                }

                if ($rows) {

                    foreach ($rows as $key => $row) {

                        $rows[$key]['description'] = strtoupper($row['description']);
                        $rows[$key]['image'] = crop($row['image']);
                    }

                    $info['data_type'] = "search";
                    $info['data'] = $rows;

                    echo json_encode($info);
                }
            } else
            if ($OBJ['data_type'] == "checkout") {
                $data = $OBJ['text'];
                $sale = new Sale();
                $receipt_no = $sale->generateReceiptNumber();
                $_SESSION['receipt_no'] = $receipt_no;
                $user_id = auth("id");
                $date = date("Y-m-d H:i:s");

                $db = new Database();

                // Fetch user's balance
                $userBalance = $db->query("SELECT balance FROM users WHERE id = ?", [$user_id]);
                $userBalance = is_array($userBalance) ? $userBalance[0]['balance'] : 0;

                // Calculate total amount for the transaction
                $totalAmount = 0;
                foreach ($data as $row) {
                    $arr = [];
                    $arr['id'] = $row['id'];
                    $query = "SELECT * FROM products WHERE id = :id LIMIT 1";
                    $check = $db->query($query, $arr);
                    $productClass = new Product();
                    $productClass->updateQuantity($row['id'], $row['qty']);

                    if (is_array($check)) {
                        $check = $check[0];
                        $totalAmount += $row['qty'] * $check['amount'];
                    }
                }

                // Check if user has sufficient balance
                if ($userBalance < $totalAmount) {
                    $info['data_type'] = "checkout";
                    $info['data'] = "Insufficient balance. Please add funds to your account.";
                    echo json_encode($info);
                    return;
                }

                // Proceed with the transaction
                $totalAmount = 0;
                foreach ($data as $row) {
                    $arr = [];
                    $arr['id'] = $row['id'];
                    $query = "SELECT * FROM products WHERE id = :id LIMIT 1";
                    $check = $db->query($query, $arr);

                    if (is_array($check)) {
                        $check = $check[0];
                        $itemAmount = $check['discount'] > 0 ? $check['discounted_price'] : $check['amount'];
                        $totalAmount += $row['qty'] * $itemAmount;
                        // Save to database
                        $arr = [];
                        $arr['barcode'] = $check['barcode'];
                        $arr['description'] = $check['description'];
                        $arr['amount'] = $check['amount'];
                        $arr['qty'] = $row['qty'];
                        $arr['total'] = $row['qty'] * $check['amount'];
                        $arr['receipt_no'] = $receipt_no;
                        $arr['date'] = $date;
                        $arr['user_id'] = $user_id;

                        $query = "INSERT INTO sales (barcode, receipt_no, description, qty, amount, total, date, user_id) VALUES (:barcode, :receipt_no, :description, :qty, :amount, :total, :date, :user_id)";
                        $db->query($query, $arr);

                        // Add view count for this product
                        $query = "UPDATE products SET views = views + 1 WHERE id = :id LIMIT 1";
                        $db->query($query, ['id' => $check['id']]);
                    }
                }

                // Update receipt number in the database
                $query = "UPDATE sales SET receipt_no = :receipt_no WHERE receipt_no IS NULL";
                $db->query($query, ['receipt_no' => $receipt_no]);

                // Deduct the total amount from the user's balance
                $newBalance = $userBalance - $totalAmount;
                $db->query("UPDATE users SET balance = :balance WHERE id = :user_id", ['balance' => $newBalance, 'user_id' => $user_id]);

                $info['data_type'] = "checkout";
                $info['data'] = "Items saved successfully!";
                echo json_encode($info);
            }
        }
    }
