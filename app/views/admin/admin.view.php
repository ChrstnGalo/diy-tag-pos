<?php require views_path('partials/header'); ?>

<div>
	<div class="d-flex" id="wrapper" style="margin-left:-12px">
		<!-- Sidebar -->
		<div style="background-color: #335500;" id="sidebar-wrapper">
			<div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
				<a class="navbar-brand" href="index.php?pg=home" style="background: transparent;"><img src="assets/images/d.png" alt="Logo" width="100" height="auto"></a><br>DIY-TAG
			</div>

			<div class="list-group list-group-flush my-2">
				<?php
				$links = array(
					array("url" => "index.php?pg=admin&tab=dashboard", "icon" => "fas fa-tachometer-alt", "text" => "Dashboard", "label" => "Master List"),
					array("url" => "index.php?pg=admin&tab=category", "icon" => "fa-solid fa-list", "text" => "Categories", "label" => "Master List"),
					array("url" => "index.php?pg=admin&tab=announcement", "icon" => "fa-solid fa-list", "text" => "Announcement", "label" => "Master List"),
					array("url" => "index.php?pg=category-add", "icon" => "fa-solid fa-layer-group", "text" => "Add Categories", "label" => "Master List"),
					array("url" => "index.php?pg=admin&tab=products", "icon" => "fas fa-shopping-cart", "text" => "Manage Products", "label" => "Master List"),
					array("url" => "index.php?pg=product-new", "icon" => "fa-brands fa-product-hunt", "text" => "Add Product", "label" => "Master List"),
					array("url" => "index.php?pg=admin&tab=sales", "icon" => "fas fa-hand-holding-usd", "text" => "Sales", "label" => "Report"),
					array("url" => "index.php?pg=admin&tab=users", "icon" => "fa-solid fa-user", "text" => "Users", "label" => "System"),
					array("url" => "index.php?pg=signup", "icon" => "fa-solid fa-users", "text" => "Create User", "label" => "System"),
					array("url" => "index.php?pg=logout", "icon" => "fas fa-power-off", "text" => "Logout")
				);

				$currentLabel = null;

				foreach ($links as $link) {
					if (array_key_exists('label', $link)) {
						if ($currentLabel != $link['label']) {
							$currentLabel = $link['label'];
							echo '<label style="color:white;margin-left:20px">' . $currentLabel . '</label>';
						}
					}
					$isActive = (!$tab && $link["text"] == "Dashboard") || ($tab == strtolower(str_replace(' ', '', $link["text"])));
				?>
					<a href="<?= $link["url"] ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?= $isActive ? 'active' : '' ?>"><i class="<?= $link["icon"] ?> me-2"></i><?= $link["text"] ?></a>
				<?php } ?>
			</div>
		</div>
		<div class="col p-3">
			<?php
			switch ($tab) {
				case 'products':
					require views_path('admin/products');
					break;
				case 'users':
					require views_path('admin/users');
					break;
				case 'sales':
					require views_path('admin/sales');
					break;
				case 'category':
					require views_path('admin/category');
					break;
				case 'announcement':
					require views_path('admin/announcement');
					break;
				default:
					require views_path('admin/dashboard');
					break;
			}
			?>
		</div>
	</div>
</div>

<?php require views_path('partials/footer'); ?>