<div id="page-content-wrapper">
	<div class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
		<div class="d-flex align-items-center">
			<i class="fas fa-gift secondary-text fs-4 me-3" id="menu-toggle"></i>
			<h1 class="fs-1 m-0">Products</h1>
		</div>
		<div class="d-flex mb-3">
			<input id="searchInput" style="width: 500px; margin-left: 700px;" class="form-control me-2" type="search" placeholder="Search Product" aria-label="Search">
			<button onclick="searchProduct()" style="background-color:#335500;" class="btn text-white btn-sm" type="submit">Search</button>
		</div>
	</div>

	<div class="table-responsive mx-4 mx-4 shadow-lg p-3 mb-5 bg-body rounded  bg-white">

		<table id="productTable" class="table table-striped table-hover ">
			<tr>
				<th>Barcode</th>
				<th>Product</th>
				<th>Product Code</th>
				<th>Category</th>
				<th>Qty</th>
				<th>Discount</th>
				<th>Price</th>
				<th>Discounted Price</th>
				<th>Image</th>
				<th>Date</th>
				<th>Action</th>
				<th>
				</th>
			</tr>

			<?php if (!empty($products)) : ?>
				<?php foreach ($products as $product) : ?>
					<tr>

						<td>
							<div>
								<img src="<?= $product['barcode_img'] ?>" style="max-width:100px;height:50px;margin-top:5px">
							</div>
							<div>
								<?= esc($product['barcode']) ?>
							</div>
						</td>
						<td>
							<a href="index.php?pg=product-single&id=<?= $product['id'] ?>">
								<?= esc($product['description']) ?>
							</a>
						</td>
						<td><?= esc($product['prod_code']) ?></td>
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

		function searchProduct() {
			// Kunin ang input value mula sa search bar
			var searchInput = document.getElementById("searchInput").value.toLowerCase();

			// Kunin ang buong table
			var table = document.getElementById("productTable");

			// Kunin ang lahat ng rows sa table
			var rows = table.getElementsByTagName("tr");

			// Loop sa bawat row, umpisahan sa 1 (skip ang header row)
			for (var i = 1; i < rows.length; i++) {
				// Kunin ang cell ng description sa bawat row
				var descriptionCell = rows[i].getElementsByTagName("td")[1];

				// I-check kung ang description ay naglalaman ng search input
				if (descriptionCell) {
					var descriptionText = descriptionCell.textContent || descriptionCell.innerText;

					// I-check kung ang description ay naglalaman ng search input
					if (descriptionText.toLowerCase().indexOf(searchInput) > -1) {
						// Ipakita ang row kung ang description ay naglalaman ng search input
						rows[i].style.display = "";
					} else {
						// Itago ang row kung ang description ay hindi naglalaman ng search input
						rows[i].style.display = "none";
					}
				}
			}
		}
	</script>