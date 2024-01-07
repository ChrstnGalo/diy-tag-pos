<div id="page-content-wrapper">
	<div class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
		<div class="d-flex align-items-center">
			<i class="fas fa-shopping-cart secondary-text fs-4 me-3" id="menu-toggle"></i>
			<h1 class="fs-1 m-0">Users</h1>
		</div>
	</div>

	<div class="table-responsive mx-4 shadow-lg p-3 mb-5 bg-body rounded  bg-white">

		<table class="table table-striped table-hover">
			<tr>
				<th>Image</th>
				<th>Username</th>
				<th>RFID</th>
				<th>gender</th>
				<th>email</th>
				<th>Balance</th>
				<th>role</th>
				<th>Qr Image</th>
				<th>Date</th>
				<th>
					<a href="index.php?pg=signup">
						<button style="background-color:#335500;" class="btn text-white btn-sm"><i class="fa fa-plus"></i> Create User</button>
					</a>
				</th>
			</tr>

			<?php if (!empty($users)) : ?>
				<?php foreach ($users as $user) : ?>
					<tr>
						<td>
							<a href="index.php?pg=profile&id=<?= $user['id'] ?>">
								<img src="<?= crop($user['image'], 400, $user['gender']) ?>" style="width: 100%;max-width:100px;">
							</a>
						</td>

						<td>
							<a href="index.php?pg=profile&id=<?= $user['id'] ?>">
								<?= esc($user['username']) ?>
							</a>
						</td>
						<td><?= esc($user['rfid']) ?></td>
						<td><?= esc($user['gender']) ?></td>
						<td><?= esc($user['email']) ?></td>
						<td><?= esc($user['balance']) ?></td>
						<td><?= esc($user['role']) ?></td>
						<td>
							<?php if (!empty($user['qr_image'])) : ?>
								<img src="<?= $user['qr_image'] ?>" alt="User QR Code" style="width: 100px; height: 100px;">
							<?php else : ?>
								No QR Code Available
							<?php endif; ?>
						</td>


						<td><?= date("jS M, Y", strtotime($user['date'])) ?></td>
						<td>
							<a href="index.php?pg=edit-user&id=<?= $user['id'] ?>">
								<button style="background-color:#8BAE22" class="btn text-white btn-sm">Edit</button>
							</a>
							<a href="index.php?pg=delete-user&id=<?= $user['id'] ?>">
								<button style="background-color:#335500" class="btn text-white btn-sm">Delete</button>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>

		</table>

		<?php $pager->display(count($users)) ?>
	</div>

	<script>
		var el = document.getElementById("wrapper");
		var toggleButton = document.getElementById("menu-toggle");

		toggleButton.onclick = function() {
			el.classList.toggle("toggled");
		};
	</script>