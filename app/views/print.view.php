<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $WshShell = new COM("WScript.Shell");
    $obj = $WshShell->Run("cmd /c wscript.exe " . ABSPATH . "/file.vbs", 0, true);

    $WshShell = new COM("WScript.Shell");
    $obj = $WshShell->Run("cmd /c wscript.exe " . ABSPATH . "/file.vbs", 0, true);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc(APP_NAME) ?></title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/print.css">

</head>

<body>
    <?php
    $vars = $_GET['vars'] ?? "";
    $obj = json_decode($vars, true);
    ?>
    <?php if (is_array($obj)) : ?>
        <div class="container">
            <img class="company-logo" src="assets/images/12345.png" alt="logo">
            <h6 class="customer-service">customerservice@diy-tag.com</h6>
            <h4 class="receipt-subheader">STI College Caloocan</h4>
            <h4 class="address">109 Samson Road corner Caimito Road, Caloocan, Philippines</h4>
            <div class="cashier-receipt">
                <div class="cashier-container">
                    <h4 class="cashier">Customer: <?= auth('username') ?></h4>
                </div>
                <div class="receipt-no-container">
                    <h4 class="receipt-no">Receipt number: <?php echo $_SESSION['receipt_no']; ?></h4>
                </div>
            </div>
            <h4 class="receipt-header">Receipt</h4>
            <div><i><?= date("jS F, Y") ?></i></div>
        </div>


        <table class="table table-striped">
            <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Amount</th>
            </tr>
            <?php foreach ($obj['data'] as $row) : ?>
                <tr>
                    <td><?= $row['qty'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td>₱<?= $row['amount'] ?></td>
                    <td>₱<?= number_format($row['qty'] * $row['amount'], 2) ?></td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="2"></td>
                <td>Available Balance:</td>
                <td><?= number_format($obj['amount'], 2) ?></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><b>Total:</b></td>
                <td><b><?= number_format($obj['gtotal'], 2) ?></b></td>
            </tr>

            <tr>
                <td colspan="2"></td>
                <td>New Balance:</td>
                <td><?= $obj['change'] ?></td>
            </tr>

            <tr>
                <td colspan="2"></td>
                <td>Total Quantity:</td>
                <td><?= ($obj['totalQuantity']) ?></td>
            </tr>

        </table>
        <center>
            <p><i>Thanks for shopping with us!</i></p><br>
            <p><i>For any concern on our product and services. please ask our Store Manager. To replace/exchange merchandise present this receipt. Subject to standard provision on consumer protection and product warranty.</i></p>
            <p><i>htpp://www.diy-tag.com.ph</i></p>
        </center>
        <br>
        <br>
    <?php endif; ?>
    <script>
        window.print();

        var ajax = new XMLHttpRequest();

        ajax.addEventListener('readystatechange', function() {
            if (ajax.readyState == 4) {
                //console.log(ajax.responseText);
            }
        });

        ajax.open('POST', '', true);
        //ajax.send();
    </script>
</body>

</html>