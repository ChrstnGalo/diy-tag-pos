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

try {

    $user_id = $_POST["id"];
    $new_balance = $_POST["new_balance"];
    $operation = $_POST["operation"];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($operation == "add") {
        $sql = "UPDATE users SET balance= balance + $new_balance WHERE id=$user_id";
    } else {
        $sql = "UPDATE users SET balance= balance - $new_balance WHERE id=$user_id";
    }
    

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


$conn->close();
?>
