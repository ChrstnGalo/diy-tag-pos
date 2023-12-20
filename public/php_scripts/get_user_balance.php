<?php
// Konektahin sa database gamit ang iyong credentials
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

// Check kung may GET request na user_id mula sa Android app
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Query para kunin ang balance batay sa user_id
    $sql = "SELECT balance FROM users WHERE id = $user_id";

    // Eksekusyon ng query
    $result = $conn->query($sql);

    // Check kung may result at i-return ang balance kung meron
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $balance = $row['balance'];
        echo $balance; // Ito ang magiging response papunta sa Android app (isang simpleng numeric value)
    } else {
        echo "User not found"; // Ito ang response kung walang user na may ganoong user_id
    }
} else {
    echo "Invalid request"; // Ito ang response kung hindi GET request ang natanggap o walang user_id na ipinasa
}

$conn->close(); // Isara ang database connection
?>