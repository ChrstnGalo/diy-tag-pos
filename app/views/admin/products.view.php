<div id="page-content-wrapper">
	<div class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
		<div class="d-flex align-items-center">
			<i class="fas fa-gift secondary-text fs-4 me-3" id="menu-toggle"></i>
			<h1 class="fs-1 m-0">Products</h1>
		</div>
	</div>

	<div class="table-responsive mx-4 mx-4 shadow-lg p-3 mb-5 bg-body rounded  bg-white">

		<table class="table table-striped table-hover ">
			<tr>
				<th>Barcode</th>
				<th>Product</th>
				<th>Category</th>
				<th>Qty</th>
				<th>Discount</th>
				<th>Price</th>
				<th>Discounted Price</th>
				<th>Image</th>
				<th>Date</th>
				<th>
					<a href="index.php?pg=product-new">
						<button style="background-color:#335500;" class="btn text-white btn-sm"><i class="fa fa-plus"></i> Add Product</button>
					</a>
				</th>
			</tr>

			<?php if (!empty($products)) : ?>
				<?php foreach ($products as $product) : ?>
					<tr>
						<td><?= esc($product['barcode']) ?></td>
						<td>
							<a href="index.php?pg=product-single&id=<?= $product['id'] ?>">
								<?= esc($product['description']) ?>
							</a>
						</td>
						<td><?= esc($product['category']) ?></td>
						<td><?= esc($product['qty']) ?></td>
						<td><?= esc($product['discount']) ?></td>
						<td><?= esc($product['amount']) ?></td>
						<td><?= esc($product['discounted_price']) ?></td>
						<td>
							<img src="<?= crop($product['image']) ?>" style="width: 100%;max-width:100px;">
						</td>
						<td><?= date("jS M, Y", strtotime($product['date'])) ?></td>
						<td>
							<a href="index.php?pg=product-edit&id=<?= $product['id'] ?>">
								<button style="background-color:#8BAE22" class="btn text-white btn-sm">Edit</button>
							</a>
							<a href="index.php?pg=product-delete&id=<?= $product['id'] ?>">
								<button style="background-color:#335500" class="btn text-white btn-sm">Delete</button>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>

		</table>
	</div>

	<script>
		var el = document.getElementById("wrapper");
		var toggleButton = document.getElementById("menu-toggle");

		toggleButton.onclick = function() {
			el.classList.toggle("toggled");
		};
	</script>