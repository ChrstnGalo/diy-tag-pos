<?php
// Mag-connect sa database
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

$DBHOST = "localhost";
$DBNAME = "id21357081_pos_db";
$DBUSER = "root";
$DBPASS = "";
$DBDRIVER = "mysql";

$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kumonekta sa database at kumuha ng mga users
$result = $conn->query("SELECT id, unique_num, balance, rfid, qr_code, date, role, image, email, username, password, fname, mname, lname, contact, address, status, deletable FROM users");

if ($result->num_rows > 0) {
    // I-iterate ang result at ilagay sa isang array
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    $users = [];
}

// I-return ang mga users bilang JSON
header('Content-Type: application/json');
echo json_encode($users);

// Isara ang koneksyon
$conn->close();
