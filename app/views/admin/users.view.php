<div id="page-content-wrapper">
	<div class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
		<div class="d-flex align-items-center">
			<i class="fas fa-shopping-cart secondary-text fs-4 me-3" id="menu-toggle"></i>
			<h1 class="fs-1 m-0">Users</h1>
		</div>
		<div class="d-flex mb-3">
			<input id="searchInput" style="width: 500px; margin-left: 750px;" class="form-control me-2" type="search" placeholder="Search User" aria-label="Search">
			<button onclick="searchUser()" style="background-color:#335500;" class="btn text-white btn-sm" type="submit">Search</button>
		</div>
	</div>

</div>


<div class="table-responsive mx-4 shadow-lg p-3 mb-5 bg-body rounded  bg-white">

	<table id="userTable" class="table table-striped table-hover">
		<tr>
			<th>Image</th>
			<th>Username</th>
			<th>RFID</th>
			<th>gender</th>
			<th>email</th>
			<th>Balance</th>
			<th>role</th>
			<th>Qr Value</th>
			<th>Date</th>
			<th>Action</th>
			<th>

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
					<td><?= esc($user['unique_num']) ?></td>


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

	function searchUser() {
		// Kunin ang input value mula sa search bar
		var searchInput = document.getElementById("searchInput").value.toLowerCase();

		// Kunin ang buong table
		var table = document.getElementById("userTable");

		// Kunin ang lahat ng rows sa table
		var rows = table.getElementsByTagName("tr");

		// Loop sa bawat row, umpisahan sa 1 (skip ang header row)
		for (var i = 1; i < rows.length; i++) {
			// Kunin ang cell ng username sa bawat row
			var usernameCell = rows[i].getElementsByTagName("td")[1];

			// I-check kung ang username ay naglalaman ng search input
			if (usernameCell) {
				var usernameText = usernameCell.textContent || usernameCell.innerText;

				// I-check kung ang username ay naglalaman ng search input
				if (usernameText.toLowerCase().indexOf(searchInput) > -1) {
					// Ipakita ang row kung ang username ay naglalaman ng search input
					rows[i].style.display = "";
				} else {
					// Itago ang row kung ang username ay hindi naglalaman ng search input
					rows[i].style.display = "none";
				}
			}
		}
	}
</script>