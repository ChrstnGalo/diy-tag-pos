<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = new User();

    // Set default balance value
    $_POST['balance'] = 0;

    $_POST['role'] = "user";
    $_POST['date'] = date("Y-m-d H:i:s");

    $unique_num = generateUniqueToken();
    $_POST['unique_num'] = $unique_num;

    // Store the unique_num in a session variable
    $_SESSION['unique_num'] = $unique_num;

    $errors = $user->validate($_POST);
    if (empty($errors)) {
        $user->insert($_POST, 'users');

        // Path to store the generated QR code images
        $tempDir = 'assets/qr/';

        // Create the QR code
        QRcode::png($unique_num, $tempDir . $unique_num . '.png');

        // Save the QR code path to your database table
        $qr_image_path = $tempDir . $unique_num . '.png';
        $user->updateQrImagePath($qr_image_path, $unique_num); // Update the QR code path in the database

        redirect('admin');
    }
}

function generateUniqueToken()
{
    // Generate a unique token using a combination of timestamp and a secure random number
    $timestamp = microtime(true) * 10000; // You can adjust the precision as needed
    $random = random_int(1000, 9999); // A secure random 4-digit number

    // Combine and hash the values to create a unique token
    $unique_token = md5($timestamp . $random);

    return $unique_token;
}

if (Auth::access('user')) {
    require views_path('auth/signup');
}
