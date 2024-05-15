<?php

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $announcementModel = new Announcement();
    $data = [
        'title' => $_POST['title'],
        'body' => $_POST['body']
    ];

    $errors = $announcementModel->validate($data);

    if (empty($errors)) {
        // Validation passed, save the announcement
        $announcementModel->insert($data);

        // Redirect back to announcements view
        header("Location: index.php?pg=admin&tab=announcement");
        exit();
    }
}

require views_path('products/announcement-add');
