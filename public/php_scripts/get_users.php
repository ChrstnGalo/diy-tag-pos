<?php
// Mag-connect sa database
$DBHOST = "localhost";
$DBNAME = "id21357081_pos_db";
$DBUSER = "id21357081_root";
$DBPASS = "Galo123456789@@";
$DBDRIVER = "mysql";

$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kumonekta sa database at kumuha ng mga users
$result = $conn->query("SELECT id, email, password, username, date, role, image, gender, balance FROM users");

if ($result->num_rows > 0) {
    // I-iterate ang result at ilagay sa isang array
    while($row = $result->fetch_assoc()) {
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
