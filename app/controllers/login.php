<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = new User();

    if (!empty($_POST['rfid']) && !empty($_POST['pin_number_rfid'])) {
        // Handle RFID and PIN login
        $rfid = $_POST['rfid'];
        $pin_number_rfid = $_POST['pin_number_rfid'];

        $row = $user->where(['rfid' => $rfid, 'pin_number_rfid' => $pin_number_rfid]);

        if (!empty($row) && $rfid == $row[0]['rfid'] && $pin_number_rfid == $row[0]['pin_number_rfid']) {
            authenticate($row[0]);
            redirect('home');
        } else {
            $errors['rfid'] = "RFID and PIN number do not match";
        }
    } else if (!empty($_POST['unique_num']) && isset($_POST['pin_number_qr'])) {
        // Handle QR code and PIN login
        $unique_num = $_POST['unique_num'];
        $pin_number_qr = $_POST['pin_number_qr'];

        $row = $user->where(['unique_num' => $unique_num]);

        if (!empty($row) && $unique_num == $row[0]['unique_num'] && $pin_number_qr == $row[0]['pin_number_qr']) {
            authenticate($row[0]);
            redirect('home');
        } else {
            $errors['unique_num'] = "QR code and PIN number do not match";
        }
    } else {
        $errors['unique_num'] = "Both QR code and PIN number are required";
    }
}


require views_path('auth/login');
