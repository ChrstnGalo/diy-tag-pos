<?php require views_path('partials/header'); ?>

<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

	<?php if (!empty($row)) : ?>

		<form method="post" enctype="multipart/form-data">

			<h5 style="font-size: 30px;" class="text-dark"><i class="fa fa-hamburger"></i> Delete Product</h5>

			<div class="alert alert-danger text-center">Are you sure you want to delete this product??!!</div>

			<div class="mb-3">
				<label for="productControlInput1" class="form-label">Product description</label>
				<input disabled value="<?= set_value('description', $row['description']) ?>" name="description" type="text" class="form-control <?= !empty($errors['description']) ? 'border-danger' : '' ?>" id="productControlInput1" placeholder="Product description">
				<?php if (!empty($errors['description'])) : ?>
					<small class="text-danger"><?= $errors['description'] ?></small>
				<?php endif; ?>
			</div>

			<div class="mb-3">
				<label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
				<input disabled value="<?= set_value('barcode', $row['barcode']) ?>" name="barcode" type="text" class="form-control <?= !empty($errors['barcode']) ? 'border-danger' : '' ?>" id="barcodeControlInput1" placeholder="Product barcode">
				<?php if (!empty($errors['barcode'])) : ?>
					<small class="text-danger"><?= $errors['barcode'] ?></small>
				<?php endif; ?>
			</div>

			<div class="mb-3">
				<label for="prod_codeControlInput1" class="form-label">Product Code</label>
				<input disabled value="<?= set_value('prod_code', $row['prod_code']) ?>" name="prod_code" type="text" class="form-control <?= !empty($errors['prod_code']) ? 'border-danger' : '' ?>" id="prod_codeControlInput1" placeholder="Product Code">
				<?php if (!empty($errors['prod_code'])) : ?>
					<small class="text-danger"><?= $errors['prod_code'] ?></small>
				<?php endif; ?>
			</div>


			<br>
			<img class="mx-auto d-block" src="<?= $row['image'] ?>" style="width:80%;">
			<br>
			<button style="background-color:#335500;color:white;" class="btn float-end">Delete</button>
			<a href="index.php?pg=admin&tab=products">
				<button style="background-color:#8BAE22;color:white;" type="button" class="btn">Cancel</button>
			</a>
		</form>
	<?php else : ?>
		That product was not found
		<br><br>
		<a href="index.php?pg=admin&tab=products">
			<button type="button" class="btn btn-primary">Back to products</button>
		</a>

	<?php endif; ?>

</div>

<?php require views_path('partials/footer'); ?>