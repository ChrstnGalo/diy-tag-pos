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
		<div class="main-cards">

			<div class="card1">
				<div class="card1-inner">
					<p class="text-primary">PRODUCTS</p>
					<span class="material-icons-outlined text-blue">inventory_2</span>
				</div>
				<span class="text-primary font-weight-bold"><?= $total_products ?></span>
			</div>

			<div class="card1">
				<div class="card1-inner">
					<p class="text-primary">TOTAL SALES</p>
					<span class="material-icons-outlined text-orange">add_shopping_cart</span>
				</div>
				<span class="text-primary font-weight-bold">₱<?= $total_sales ?></span>
			</div>

			<div class="card1">
				<div class="card1-inner">
					<p class="text-primary">TOTAL USERS</p>
					<span class="material-icons-outlined text-green">shopping_cart</span>
				</div>
				<span class="text-primary font-weight-bold"><?= $total_users ?></span>
			</div>

			<div class="card1">
				<div class="card1-inner">
					<p class="text-primary">Daily Sales</p>
					<span class="material-icons-outlined text-red">notification_important</span>
				</div>
				<span class="text-primary font-weight-bold">₱<?= $daily_sales ?></span>
			</div>
		</div>

		<?php if ($tab == "dashboard") : ?>

			<!-- Dito ay ang iba pang elements ng dashboard -->

			<div class="charts">
				<div class="charts-card">
					<p class="fs-2">Today's Sales</p>
					<?php
					$graph = new Graph();
					$data = generate_daily_data($today_records);
					$graph->title = "Today's Sales";
					$graph->xtitle = "Hours of the day";
					$graph->styles = "width:auto;";
					$graph->display($data);
					?>
				</div>

				<div class="charts-card">
					<p class="fs-2">Month's Sales</p>
					<?php
					$graph = new Graph();
					$data = generate_monthly_data($thismonth_records);
					$graph->xtitle = "Days of the month";
					$graph->styles = "width:auto;";
					$graph->display($data);
					?>
				</div>
			</div>

		<?php endif; ?>

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