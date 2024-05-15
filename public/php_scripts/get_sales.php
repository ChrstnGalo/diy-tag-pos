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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, user_id, barcode, description, amount, qty, receipt_no, amount, total, date FROM sales");

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    $users = [];
}


header('Content-Type: application/json');
echo json_encode($users);


$conn->close();
?>
