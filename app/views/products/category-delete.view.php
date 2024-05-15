<?php require views_path('partials/header'); ?>

<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

    <?php if (!empty($row)) : ?>

        <form method="post" enctype="multipart/form-data">

            <h5 style="font-size: 30px;" class="text-dark"><i class="fa fa-hamburger"></i> Delete Category</h5>

            <div class="alert alert-danger text-center">Are you sure you want to delete this category??!!</div>

            <div class="mb-3">
                <label for="category_nameControlInput1" class="form-label">Category</label>
                <input disabled value="<?= set_value('category_name', $row['category_name']) ?>" name="category_name" type="text" class="form-control <?= !empty($errors['category_name']) ? 'border-danger' : '' ?>" id="productControlInput1" placeholder="Product category_name">
                <?php if (!empty($errors['category_name'])) : ?>
                    <small class="text-danger"><?= $errors['category_name'] ?></small>
                <?php endif; ?>
            </div>

            <br>
            <button style="background-color:#335500;color:white;" class="btn float-end">Delete</button>
            <a href="index.php?pg=admin&tab=category">
                <button style="background-color:#8BAE22;color:white;" type="button" class="btn">Cancel</button>
            </a>
        </form>
    <?php else : ?>
        That Category was not found
        <br><br>
        <a href="index.php?pg=admin&tab=category">
            <button type="button" class="btn btn-primary">Back to products</button>
        </a>

    <?php endif; ?>

</div>

<?php require views_path('partials/footer'); ?>