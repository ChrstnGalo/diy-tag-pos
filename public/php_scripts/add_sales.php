<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

$DBHOST = "localhost";
$DBNAME = "id21357081_pos_db";
$DBUSER = "id21357081_root";
$DBPASS = "Galo123456789@@";
$DBDRIVER = "mysql";

$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$user_id = $_POST["user_id"];
		$barcode = $_POST["barcode"];
		$description = $_POST["description"];
		$qty = $_POST["qty"];
		$receipt_no = $_POST["receipt_no"];
		$amount = $_POST["amount"];
		$total = $_POST["total"];
		$date = $_POST["date"];
		
		
	$add = $conn->prepare("INSERT INTO sales (user_id, barcode, description, qty, receipt_no, amount, total, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

	$add->bind_param("sssisdds", $user_id, $barcode, $description, $qty, $receipt_no, $amount, $total, $date );
   
if ($add->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $add->error;
    }

    $add->close();
}

$conn->close();
?>
