<?php
// Mag-connect sa database
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

// Tanggapin ang user_id at new_balance mula sa POST request
$user_id = $_POST["user_id"];
$new_balance = $_POST["new_balance"];

// Gumawa ng SQL query para i-update ang balance ng user
$sql = "UPDATE users SET balance = balance + $new_balance WHERE id = $user_id";

if ($conn->query($sql) === TRUE) {
    echo "Balance updated successfully";
} else {
    echo "Error updating balance: " . $conn->error;
}

$conn->close();
?>
