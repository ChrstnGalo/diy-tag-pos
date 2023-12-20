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

$user_id = $_GET['userId']; // userId should be passed from the app

$currentUsername = $_GET['currentUsername']; // Passed from the app
$currentEmail = $_GET['currentEmail']; // Passed from the app
$currentPassword = $_GET['currentPassword']; // Passed from the app
$currentImageUrl = $_GET['currentImageUrl']; // Passed from the app
$currentGender = $_GET['currentGender']; // Passed from the app

// Querying the database for a specific user_id
$sql = "SELECT username, email, password, image, gender FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Values from the database for the specific user_id
    $usernameFromServer = $row['username'];
    $emailFromServer = $row['email'];
    $passwordFromServer = $row['password'];
    $imageUrlFromServer = $row['image'];
    $genderFromServer = $row['gender'];

    // Comparing values from the server and the app
    if ($currentUsername != $usernameFromServer ||
        $currentEmail != $emailFromServer ||
        $currentPassword != $passwordFromServer ||
        $currentImageUrl != $imageUrlFromServer ||
        $currentGender != $genderFromServer) {
        // There are updates in the fields
        echo json_encode(array('hasUpdates' => true));
    } else {
        // No changes in the fields
        echo json_encode(array('hasUpdates' => false));
    }
} else {
    echo "0 results";
}

$conn->close();
?>

