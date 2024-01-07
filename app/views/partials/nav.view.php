<nav class="navbar navbar-expand-lg" style="min-width:350px;">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php?pg=home" style="background: transparent;"><img src="assets/images/d.png" alt="Logo" width="70" height="auto"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php?pg=home">Point of sale</a>
				</li>

				<?php if (Auth::access('supervisor')) : ?>
					<li class="nav-item">
						<a class="nav-link" href="index.php?pg=admin">Admin</a>
					</li>
				<?php endif; ?>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Hi, <?= auth('username') ?> (<?= Auth::get('role') ?>)
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="index.php?pg=profile">Profile</a></li>

						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="index.php?pg=logout">Logout</a></li>
					</ul>
				</li>


			</ul>
			<?php if (Auth::logged_in()) : ?>
				<div class="nav-item">
					<a class="nav-link"><i class="fa-solid fa-wallet"></i> Available Balance: <?= (Auth::get('balance') !== "Unknown") ? esc(Auth::get('balance')) : "0" ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</nav>