<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= esc(APP_NAME) ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/payrfid.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/home.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/payment.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="assets/css/signup.css">
	<link rel="icon" type="image/x-icon" href="assets/images/d.png">
	<script type="text/javascript" src="assets/js/vue.min.js"></script>
	<script type="text/javascript" src="assets/js/adapter.min.js"></script>
	<script type="text/javascript" src="assets/js/instascan.min.js"></script>
</head>

<body>

	<?php
	$no_nav[] = "login";
	$no_nav[] = "admin";
	$no_nav[] = "signup";
	$no_nav[] = "edit-user";
	$no_nav[] = "delete-user";
	$no_nav[] = "product-edit";
	$no_nav[] = "product-new";
	$no_nav[] = "product-delete";
	$no_nav[] = "thanks";
	$no_nav[] = "category";
	$no_nav[] = "category-add";

	?>
	<?php if (!in_array($controller, $no_nav)) : ?>
		<?php require views_path('partials/nav'); ?>
	<?php endif; ?>

	<div class="container-fluid" style="min-width: 350px;">