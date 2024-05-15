<?php

$errors = [];
$id = $_GET['id'] ?? null;

$announcementModel = new Announcement();
$row = $announcementModel->first(['id' => $id]);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $row) {
    // Handle form submission
    $data = [
        'title' => $_POST['title'],
        'body' => $_POST['body']
    ];

    $errors = $announcementModel->validate($data, $id);

    if (empty($errors)) {
        // Validation passed, update the announcement
        $announcementModel->update($id, $data);

        // Redirect back to announcements view
        header("Location: index.php?pg=admin&tab=announcement");
        exit();
    }
}

require views_path('products/announcement-edit');
