<?php require views_path('partials/header'); ?>

<section class="vh-100 gradient-custom">
	<div class="container py-5 h-100">
		<div class="row justify-content-center align-items-center h-100">
			<div class="col-12 col-lg-9 col-xl-7">
				<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
					<div class="card-body p-4 p-md-5">
						<h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
						<form method="post">

							<div class="row">
								<div class="col-md-6 mb-4">

									<div class="form-outline">
										<label for="fnameFormControlInput1" class="form-label">First Name</label>
										<input value="<?= set_value('fname') ?>" name="fname" type="text" class="form-control <?= !empty($errors['fname']) ? 'border-danger' : '' ?>" id="fnameFormControlInput1" placeholder="First Name">
										<?php if (!empty($errors['fname'])) : ?>
											<small class="text-danger"><?= $errors['fname'] ?></small>
										<?php endif; ?>
									</div>

								</div>
								<div class="col-md-6 mb-4">

									<div class="form-outline">
										<label for="lnameFormControlInput1" class="form-label">Last Name</label>
										<input value="<?= set_value('lname') ?>" name="lname" type="text" class="form-control <?= !empty($errors['lname']) ? 'border-danger' : '' ?>" id="lnameFormControlInput1" placeholder="Last Name">
										<?php if (!empty($errors['lname'])) : ?>
											<small class="text-danger"><?= $errors['lname'] ?></small>
										<?php endif; ?>
									</div>

								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mb-4 d-flex align-items-center">

									<div class="form-outline datepicker w-100">
										<label for="usernameFormControlInput1" class="form-label">Username</label>
										<input value="<?= set_value('username') ?>" name="username" type="text" class="form-control <?= !empty($errors['username']) ? 'border-danger' : '' ?>" id="usernameFormControlInput1" placeholder="Username">
										<?php if (!empty($errors['username'])) : ?>
											<small class="text-danger"><?= $errors['username'] ?></small>
										<?php endif; ?>
									</div>

								</div>

								<div class="col-md-6 mb-4">

									<h6 class="mb-2 pb-1">Gender: </h6>

									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" <?= !empty($errors['gender']) ? 'border-danger' : '' ?> name="inlineRadioOptions" id="femaleGender" value="option1" checked />
										<label class="form-check-label" for="femaleGender">Female</label>
									</div>

									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" <?= !empty($errors['gender']) ? 'border-danger' : '' ?> name="inlineRadioOptions" id="maleGender" value="option2" />
										<label class="form-check-label" for="maleGender">Male</label>
									</div>
									<?php if (!empty($errors['gender'])) : ?>
										<small class="text-danger"><?= $errors['gender'] ?></small>
									<?php endif; ?>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mb-4 pb-2">

									<div class="form-outline">
										<label for="emailFormControlInput1" class="form-label">Email address</label>
										<input value="<?= set_value('email') ?>" name="email" type="email" class="form-control  <?= !empty($errors['email']) ? 'border-danger' : '' ?>" id="emailFormControlInput1" placeholder="name@example.com">
										<?php if (!empty($errors['email'])) : ?>
											<small class="text-danger"><?= $errors['email'] ?></small>
										<?php endif; ?>
									</div>

								</div>
								<div class="col-md-6 mb-4 pb-2">

									<div class="form-outline">
										<label for="rfidFormControlInput1" class="form-label">RFID Number</label>
										<input value="<?= set_value('rfid') ?>" name="rfid" type="text" class="form-control  <?= !empty($errors['rfid']) ? 'border-danger' : '' ?>" id="rfidFormControlInput1" placeholder="Exp: 000123584">
										<?php if (!empty($errors['rfid'])) : ?>
											<small class="text-danger"><?= $errors['rfid'] ?></small>
										<?php endif; ?>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-4 pb-2">

									<div class="form-outline">
										<label for="addressFormControlInput1" class="form-label">Address</label>
										<input value="<?= set_value('address') ?>" name="address" type="address" class="form-control  <?= !empty($errors['address']) ? 'border-danger' : '' ?>" id="addressFormControlInput1" placeholder="Address">
										<?php if (!empty($errors['address'])) : ?>
											<small class="text-danger"><?= $errors['address'] ?></small>
										<?php endif; ?>
									</div>

								</div>
								<div class="col-md-6 mb-4 pb-2">

									<div class="form-outline">
										<label for="contactFormControlInput1" class="form-label">Phone Number</label>
										<input value="<?= set_value('contact') ?>" name="contact" type="contact" class="form-control  <?= !empty($errors['contact']) ? 'border-danger' : '' ?>" id="contactFormControlInput1" placeholder="Contact Number">
										<?php if (!empty($errors['contact'])) : ?>
											<small class="text-danger"><?= $errors['contact'] ?></small>
										<?php endif; ?>
									</div>

								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mb-4 pb-2">

									<div class="form-outline">
										<label for="exampleFormControlInput1" class="form-label">Password</label>
										<input value="<?= set_value('password') ?>" name="password" type="password" class="form-control  <?= !empty($errors['password']) ? 'border-danger' : '' ?>" placeholder="Enter Password" aria-label="Password" aria-describedby="basic-addon1">
										<br>
										<?php if (!empty($errors['password'])) : ?>
											<small class="text-danger col-12"><?= $errors['password'] ?></small>
										<?php endif; ?>
									</div>

								</div>
								<div class="col-md-6 mb-4 pb-2">

									<div class="form-outline">
										<label for="exampleFormControlInput1" class="form-label">Retype Password</label>
										<input value="<?= set_value('password_retype') ?>" name="password_retype" type="password" class="form-control  <?= !empty($errors['password_retype']) ? 'border-danger' : '' ?>" placeholder="Retype Password" aria-label="Username" aria-describedby="basic-addon1">
										<?php if (!empty($errors['password_retype'])) : ?>
											<small class="text-danger col-12"><?= $errors['password_retype'] ?></small>
										<?php endif; ?>
									</div>

								</div>
							</div>


							<a href="index.php?pg=admin&tab=users">
								<button style="background-color:#335500;color:white;" class="btn float-end">Create</button>
							</a>

							<a href="index.php?pg=admin&tab=users">
								<button style="background-color:#8BAE22;color:white;" type="button" class="btn">Cancel</button>
							</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require views_path('partials/footer'); ?>