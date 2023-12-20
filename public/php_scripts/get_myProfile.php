<?php
// I-check kung may user_id na ipinapasa mula sa GET request
if (isset($_GET['user_id'])) {
    // Konektahin sa database
$DBHOST = "localhost";
$DBNAME = "id21357081_pos_db";
$DBUSER = "id21357081_root";
$DBPASS = "Galo123456789@@";
$DBDRIVER = "mysql";

$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

    // Check ng connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Kunin ang user_id mula sa GET request
    $user_id = $_GET['user_id'];

    // Query para kunin ang username at image_url ng user base sa user_id
    $sql = "SELECT email, username, image, role, date, gender FROM users WHERE id = $user_id";

    // I-execute ang query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Kunin ang data ng user
        $row = $result->fetch_assoc();
        
        // I-echo ang mga detalye ng user bilang JSON response
        echo json_encode($row);
    } else {
        // Kung walang user na nahanap
        echo "No user found";
    }

    // Isara ang database connection
    $conn->close();
} else {
    // Kung walang user_id na ipinasa
    echo "No user_id provided";
}
?>
