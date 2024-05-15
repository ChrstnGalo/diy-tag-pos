<?php
// Mag-connect sa database

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

$DBHOST = "localhost";
$DBNAME = "id21357081_pos_db";
$DBUSER = "id21357081_root";
$DBPASS = "Galo123456789@@";
$DBDRIVER = "mysql";

$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query para kunin ang mga record na may hindi 0 na halaga sa field ng discount
$sql = "SELECT description, qty, amount, image, discounted_price, prod_code, barcode FROM products WHERE discount <> 0";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lumikha ng isang array para sa mga resulta
    $response = array();

    while ($row = $result->fetch_assoc()) {
        // Idagdag ang bawat row sa response array
        $response[] = $row;
    }

    // I-echo ang response array bilang JSON
    echo json_encode($response);
} else {
    // Kung walang record na natagpuan
    echo "0 results";
}

// Isara ang koneksyon sa database
$conn->close();
