<?php

$errors = [];

$id = $_GET['id'] ?? null;
$announcement = new Announcement();

$row = $announcement->first(['id' => $id]);

if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
    $announcement->delete($row['id']);

    // Redirect back to announcements view
    header("Location: index.php?pg=admin&tab=announcement");
    exit();
}

require views_path('products/announcement-delete');
