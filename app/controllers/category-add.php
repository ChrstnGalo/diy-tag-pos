<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $categoryModel = new Category();
    $data = [
        'category_name' => $_POST['category_name']
    ];

    $errors = $categoryModel->validate($data);

    if (empty($errors)) {
        // Validation passed, save the category
        $categoryModel->insert($data);

        // Redirect back to category view
        header("Location: index.php?pg=admin&tab=category");
        exit();
    }
}

require views_path('products/category-add');
