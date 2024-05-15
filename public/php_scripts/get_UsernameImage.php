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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $unique_num = $_POST["unique_num"];
    $balance = $_POST["balance"];
    $rfid = $_POST["rfid"];
    $qr_code = $_POST["qr_code"];
    $date = $_POST["date"];
    $role = $_POST["role"];
    $image = $_POST["image"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $status = $_POST["status"];
    $deletable = $_POST["deletable"];

    $add = $conn->prepare("INSERT INTO users (unique_num, balance, rfid, qr_code, date, role, image, email, username, password, fname, mname, lname, contact, address, status, deletable) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $add->bind_param("sssssssssssssssss", $unique_num, $balance, $rfid, $qr_code, $date, $role, $image, $email, $username, $password, $fname, $mname, $lname, $contact, $address, $status, $deletable);

    if ($add->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $add->error;
    }

    $add->close();
}

$conn->close();
