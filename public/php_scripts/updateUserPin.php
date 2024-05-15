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

// Suriin kung mayroong `user_id` at `pin_num` na ipinasa
if (isset($_POST['user_id']) && isset($_POST['pin_num'])) {
    $userId = $_POST['user_id'];
    $pinNum = $_POST['pin_num'];

    // Gumamit ng prepared statement para sa seguridad
    $stmt = $conn->prepare("UPDATE users SET pin_number_rfid = ?, pin_number_qr = ? WHERE id = ?");
    $stmt->bind_param("sii", $pinNum, $pinNum, $userId);

    if ($stmt->execute()) {
        echo "User's pin numbers updated successfully";
    } else {
        echo "Error updating user's pin numbers: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
