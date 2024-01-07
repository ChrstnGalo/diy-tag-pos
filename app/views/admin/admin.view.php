<?php require views_path('partials/header'); ?>

<div>


	<div class="d-flex" id="wrapper" style="margin-left:-12px">
		<!-- Sidebar -->
		<div style="background-color: #335500;" id="sidebar-wrapper">
			<div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><a class="navbar-brand" href="index.php?pg=home" style="background: transparent;"><img src="assets/images/d.png" alt="Logo" width="100" height="auto"></a><br>DIY-TAG</div>


			<div class="list-group list-group-flush my-3">
				<a href="index.php?pg=admin&tab=dashboard" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?= !$tab || $tab == 'dashboard' ? 'active' : '' ?>"><i class=" fas fa-tachometer-alt me-2"></i>Dashboard</a>
				<a href="index.php?pg=admin&tab=users" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?= $tab == 'users' ? 'active' : '' ?>"><i class="fas fa-shopping-cart me-2"></i>Users</a>
				<a href="index.php?pg=admin&tab=products" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?= $tab == 'products' ? 'active' : '' ?>"><i class="fas fa-gift me-2"></i>Products</a>
				<a href="index.php?pg=admin&tab=sales" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?= $tab == 'sales' ? 'active' : '' ?>"><i class="fas fa-hand-holding-usd me-2"></i>Sales</a>
				<a href="index.php?pg=logout" style="color:#ff8b3b;" class="list-group-item list-group-item-action bg-transparent fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
			</div>
		</div>
		<div class="col p-3">

			<?php

			switch ($tab) {
				case 'products':
					// code...
					require views_path('admin/products');
					break;

				case 'users':
					// code...
					require views_path('admin/users');
					break;

				case 'sales':
					// code...
					require views_path('admin/sales');
					break;
				case 'analytics':
					// code...
					require views_path('admin/analytics');
					break;

				default:
					// code...

					require views_path('admin/dashboard');
					break;
			}


			?>
		</div>
	</div>
</div>

<?php require views_path('partials/footer'); ?>