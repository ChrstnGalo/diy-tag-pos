<?php
$categoryModel = new Category();
$categories = $categoryModel->getAll();
?>

<?php require views_path('partials/header'); ?>

<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

	<form method="post" enctype="multipart/form-data">

		<h5 style="font-size: 30px;" class="text-dark"><i class="fa fa-hamburger"></i> Add Product</h5>

		<div class="mb-3">
			<label for="productControlInput1" class="form-label">Product description</label>
			<input name="description" type="text" class="form-control <?= !empty($errors['description']) ? 'border-danger' : '' ?>" id="productControlInput1" placeholder="Product description">
			<?php if (!empty($errors['description'])) : ?>
				<small class="text-danger"><?= $errors['description'] ?></small>
			<?php endif; ?>
		</div>

		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Category</label>
			<select name="category" aria-label="Default select example" class="form-select  <?= !empty($errors['category']) ? 'border-danger' : '' ?>">
				<?php if (!empty($categories)) : ?>
					<?php foreach ($categories as $category) : ?>
						<option><?= esc($category['category_name']) ?></option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>
			<?php if (!empty($errors['category'])) : ?>
				<small class="text-danger"><?= $errors['category'] ?></small>
			<?php endif; ?>
		</div>


		<div class="mb-3">
			<label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
			<input name="barcode" type="text" class="form-control <?= !empty($errors['barcode']) ? 'border-danger' : '' ?>" id="barcodeControlInput1" placeholder="Product barcode">
			<?php if (!empty($errors['barcode'])) : ?>
				<small class="text-danger"><?= $errors['barcode'] ?></small>
			<?php endif; ?>
		</div>

		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Product Code</label>
			<select name="prod_code" aria-label="Default select example" class="form-select  <?= !empty($errors['prod_code']) ? 'border-danger' : '' ?>">
				<option>Enter Product Code</option>
				<option>LEDL31</option>
				<option>LEDL32</option>
				<option>LEDL33</option>
				<option>LEDL34</option>
				<option>LEDL41</option>
				<option>LEDL42</option>
				<option>LEDL43</option>
				<option>LEDL44</option>
			</select>
			<?php if (!empty($errors['prod_code'])) : ?>
				<small class="text-danger"><?= $errors['prod_code'] ?></small>
			<?php endif; ?>
		</div>


		<div class="mb-3">
			<label for="discountControlInput1" class="form-label">Discount <small class="text-muted">(if needed)</small></label>
			<input name="discount" type="text" class="form-control <?= !empty($errors['discount']) ? 'border-danger' : '' ?>" id="discountControlInput1" placeholder="Discounted Product">
			<?php if (!empty($errors['discount'])) : ?>
				<small class="text-danger"><?= $errors['discount'] ?></small>
			<?php endif; ?>
		</div>

		<div class="input-group mb-3">
			<span class="input-group-text">Qty:</span>
			<input name="qty" value="1" type="number" class="form-control <?= !empty($errors['qty']) ? 'border-danger' : '' ?>" placeholder="Quantity" aria-label="Quantity">
			<span class="input-group-text">Amount:</span>
			<input name="amount" value="0.00" step="0.05" type="number" class="form-control <?= !empty($errors['amount']) ? 'border-danger' : '' ?>" placeholder="Amount" aria-label="Amount">
		</div>
		<?php if (!empty($errors['qty'])) : ?>
			<small class="text-danger"><?= $errors['qty'] ?></small>
		<?php endif; ?>
		<?php if (!empty($errors['amount'])) : ?>
			<small class="text-danger"><?= $errors['amount'] ?></small>
		<?php endif; ?>
		<br>
		<div class="mb-3">
			<label for="formFile" class="form-label">Product Image</label>
			<input name="image" class="form-control <?= !empty($errors['image']) ? 'border-danger' : '' ?>" type="file" id="formFile">
			<?php if (!empty($errors['image'])) : ?>
				<small class="text-danger"><?= $errors['image'] ?></small>
			<?php endif; ?>
		</div>

		<br>
		<button style="background-color:#335500;color:white;" class="btn float-end">Save</button>
		<a href="index.php?pg=admin&tab=products">
			<button style="background-color:#8BAE22;color:white;" type="button" class="btn">Cancel</button>
		</a>
	</form>
</div>

<?php require views_path('partials/footer'); ?>