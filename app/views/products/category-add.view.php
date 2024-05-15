<?php require views_path('partials/header'); ?>

<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

    <form method="post" enctype="multipart/form-data">

        <h5 style="font-size: 30px;" class="text-dark"><i class="fa-solid fa-list"></i> Add Category</h5>

        <div class="mb-3">
            <label for="category_nameControlInput1" class="form-label">Category</label>
            <input name="category_name" type="text" class="form-control <?= !empty($errors['category_name']) ? 'border-danger' : '' ?>" id="category_nameControlInput1" placeholder="Product Category" value="<?= $_POST['category_name'] ?? '' ?>">
            <?php if (!empty($errors['category_name'])) : ?>
                <small class="text-danger"><?= $errors['category_name'] ?></small>
            <?php endif; ?>
        </div>

        <button style="background-color:#335500;color:white;" class="btn float-end">Save</button>
        <a href="index.php?pg=admin&tab=category">
            <button style="background-color:#8BAE22;color:white;" type="button" class="btn">Cancel</button>
        </a>
    </form>
</div>

<?php require views_path('partials/footer'); ?>