<?php

$errors = [];

$id = $_GET['id'] ?? null;
$category = new Category();

$row = $category->first(['id' => $id]);

if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
    $category->delete($row['id']);

    redirect('admin&tab=category');
}

require views_path('products/category-delete');
