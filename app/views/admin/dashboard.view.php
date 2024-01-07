<div id="page-content-wrapper">
	<div class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
		<div class="d-flex align-items-center">
			<i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
			<h1 class="fs-1 m-0">Dashboard</h1>
		</div>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">

				<a class="nav-link text-black" href="#" role="button" aria-expanded="false">
					<b>Hi, <?= auth('username') ?> (<?= Auth::get('role') ?>)
					</b></a>
			</ul>
		</div>
	</div>
	<div class="container-fluid px-4">
		<div class="row g-3 my-2">
			<div class="col-md-3">
				<div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
					<div>
						<h3 class="fs-2"><?= $total_products ?></h3>
						<p class="fs-5">Products</p>
					</div>
					<i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
				</div>
			</div>

			<div class="col-md-3">
				<div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
					<div>
						<h3 class="fs-2"><?= $total_sales ?></h3>
						<p class="fs-5">Sales</p>
					</div>
					<i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
				</div>
			</div>

			<div class="col-md-3">
				<div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
					<div>
						<h3 class="fs-2"><?= $total_users ?></h3>
						<p class="fs-5">Total User</p>
					</div>
					<i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>

				</div>
			</div>

			<div class="col-md-3">
				<div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
					<div>
						<h3 class="fs-2"><?= $daily_sales ?></h3>
						<p class="fs-5">Daily Sales</p>
					</div>
					<i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
				</div>
			</div>

		</div>

		<div class="row my-5">
			<h3 class="fs-4 mb-3">Recent Orders</h3>
			<div class="col">
				<table class="table bg-white rounded shadow-sm table-hover">
					<thead>
						<tr>
							<th>Description</th>
							<th>Barcode</th>
							<th>Qty</th>
							<th>Amount</th>
							<th>Username</th>

						</tr>
					</thead>
					<tbody>
						<?php if (!empty($recent_sales)) : ?>
							<?php foreach ($recent_sales as $sale) : ?>
								<tr>
									<td><?= esc($sale['description']) ?></td>
									<td><?= esc($sale['barcode']) ?></td>
									<td><?= esc($sale['qty']) ?></td>
									<td><?= esc($sale['amount']) ?></td>
									<?php
									$user = get_user_by_id($sale['user_id']);
									if (empty($user)) {
										$name = "Unknown";
									} else {
										$name = $user['username'];
									}
									?>
									<td><?= esc($name) ?></td>

								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="4">No recent sales</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		var el = document.getElementById("wrapper");
		var toggleButton = document.getElementById("menu-toggle");

		toggleButton.onclick = function() {
			el.classList.toggle("toggled");
		};
	</script>