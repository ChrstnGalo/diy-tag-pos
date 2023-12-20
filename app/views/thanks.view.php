<?php require views_path('partials/header'); ?>
<style>
	body {
		background: #222327;
		--secondary: #90EE90;
	}

	.btn2 {
		margin-top: 30px;
		padding: 6px 18px;
		border-radius: 4px;
		outline: none;
		background-color: transparent;
		border: 2px solid var(--secondary);
		animation: rotate 0.4s linear both infinite;
		font-size: 16px;
		color: #90EE90;
	}

	@keyframes rotate {
		100% {
			filter: hue-rotate(-360deg)
		}
	}
</style>
<section>
	<div class="container">
		<div class="row">

			<center>
				<h1 style="margin-top: 27.5%;">Thanks for shopping with us!</h1>
				<div class="fix">
					<button class="btn2" onclick="home()"> Logout </button>
				</div>
			</center>
		</div>
	</div>
</section>

<script>
	function home() {
		window.location.href = 'index.php?pg=logout';
	}
</script>
<?php require views_path('partials/footer'); ?>