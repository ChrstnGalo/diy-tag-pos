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
		$type = $_POST["type"];
		$method = $_POST["method"];
		$amount = $_POST["amount"];
		$date = $_POST["date"];
		$time = $_POST["time"];
		$ref = $_POST["ref"];
		
		
	$add = $conn->prepare("INSERT INTO transactions (user_id, type, method, date, time, amount, ref) VALUES (?, ?, ?, ?, ?, ?, ?)");

	$add->bind_param("sssssds", $user_id, $type, $method, $date, $time, $amount, $ref);
   
if ($add->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $add->error;
    }

    $add->close();
}

$conn->close();
?>
