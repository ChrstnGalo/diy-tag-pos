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

// Check if user_id is set in the POST request
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id']; // Kunin ang user_id mula sa POST request

    // Query para hanapin ang mga sales records ng user base sa user_id
    $query = "SELECT receipt_no, date FROM sales WHERE user_id = $user_id"; // Palitan ang user_id at sales table base sa iyong sistema

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Buuin ang array para sa resulta ng query
        $response = array();

        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }

        // I-output ang resulta sa JSON format
        echo json_encode($response);
    } else {
        echo "No sales records found for this user.";
    }
} else {
    echo "No user_id provided.";
}

// I-close ang database connection
$conn->close();
?>
