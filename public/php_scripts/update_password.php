<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, HEAD, OPTIONS");
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

if(isset($_POST['id']) && isset($_POST['password'])) {
    $userId = $_POST['id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $password, $userId);

    if ($stmt->execute()) {
        echo "User's password updated successfully";
    } else {
        echo "Error updating user's password: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>