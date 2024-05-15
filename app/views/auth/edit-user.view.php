<?php

if (!empty($_SESSION['referer'])) {
    $back_link = $_SESSION['referer'];
} else {
    $back_link = "index.php?pg=admin&tab=users";
}

?>

<?php require views_path('partials/header'); ?>

<div class="container-fluid border col-lg-5 col-md-6 mt-5 p-4">
    <?php if (is_array($row)) : ?>
        <form method="post" enctype="multipart/form-data">
            <center>
                <h3><i class="fa fa-user"></i> Edit User</h3>
                <div><?= esc(APP_NAME) ?></div>
            </center>
            <br>
            <div class="mb-3">
                <label for="formFile" class="form-label">User Image</label>
                <input name="image" class="form-control <?= !empty($errors['image']) ? 'border-danger' : '' ?>" type="file" id="formFile">
                <?php if (!empty($errors['image'])) : ?>
                    <small class="text-danger"><?= $errors['image'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <img class="mx-auto d-block" src="<?= $row['image'] ?>" style="width:50%;">
            <br>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input value="<?= set_value('username', $row['username']) ?>" name="username" type="text" class="form-control <?= !empty($errors['username']) ? 'border-danger' : '' ?>" id="exampleFormControlInput1" placeholder="Username">
                <?php if (!empty($errors['username'])) : ?>
                    <small class="text-danger"><?= $errors['username'] ?></small>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                <input value="<?= set_value('email', $row['email']) ?>" name="email" type="email" class="form-control  <?= !empty($errors['email']) ? 'border-danger' : '' ?>" id="exampleFormControlInput2" placeholder="name@example.com">
                <?php if (!empty($errors['email'])) : ?>
                    <small class="text-danger"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">RFID Number</label>
                <input value="<?= set_value('rfid', $row['rfid']) ?>" name="rfid" type="text" class="form-control <?= !empty($errors['rfid']) ? 'border-danger' : '' ?>" id="exampleFormControlInput3" placeholder="RFID Number">
                <?php if (!empty($errors['rfid'])) : ?>
                    <small class="text-danger"><?= $errors['rfid'] ?></small>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Gender</label>
                <select name="gender" class="form-control  <?= !empty($errors['gender']) ? 'border-danger' : '' ?>">
                    <option><?= $row['gender'] ?></option>
                    <option>male</option>
                    <option>female</option>
                </select>
                <?php if (!empty($errors['gender'])) : ?>
                    <small class="text-danger"><?= $errors['gender'] ?></small>
                <?php endif; ?>
            </div>

            <?php if (Auth::get('role') == "admin") : ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Role</label>
                    <select name="role" class="form-control  <?= !empty($errors['role']) ? 'border-danger' : '' ?>">
                        <option><?= $row['role'] ?></option>
                        <option>admin</option>
                        <option>supervisor</option>
                        <option>user</option>
                    </select>

                    <?php if (!empty($errors['role'])) : ?>
                        <small class="text-danger"><?= $errors['role'] ?></small>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Password</span>
                <input value="<?= set_value('password', '') ?>" name="password" type="password" class="form-control  <?= !empty($errors['password']) ? 'border-danger' : '' ?>" placeholder="Password(leave empty to not change)" aria-label="Password" aria-describedby="basic-addon1">
                <br>
                <?php if (!empty($errors['password'])) : ?>
                    <small class="text-danger col-12"><?= $errors['password'] ?></small>
                <?php endif; ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Retype Password</span>
                <input value="<?= set_value('password_retype', '') ?>" name="password_retype" type="password" class="form-control  <?= !empty($errors['password_retype']) ? 'border-danger' : '' ?>" placeholder="Retype Password (leave empty to not change)" aria-label="Username" aria-describedby="basic-addon1">
                <?php if (!empty($errors['password_retype'])) : ?>
                    <small class="text-danger col-12"><?= $errors['password_retype'] ?></small>
                <?php endif; ?>
            </div>

            <br>
            <a href="<?= $back_link ?>">
                <button style="background-color:#335500;color:white;" class="btn float-end">Save</button>
            </a>
            <a href="<?= $back_link ?>">
                <button style="background-color:#8BAE22;color:white;" type="button" class="btn">Cancel</button>
            </a>

            <div class="clearfix"></div>
        </form>
    <?php else : ?>
        <div class="alert alert-danger text-center">That user was not found!</div>

        <a href="<?= $back_link ?>">
            <button style="background-color:#335500;color:white;" class="btn float-end">Save</button>
        </a>

        <a href="<?= $back_link ?>">
            <button type="button" class="btn btn-danger">Cancel</button>
        </a>



    <?php endif; ?>



</div>

<?php require views_path('partials/footer'); ?>