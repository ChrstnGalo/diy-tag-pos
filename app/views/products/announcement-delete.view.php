<?php require views_path('partials/header'); ?>

<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

    <?php if (!empty($row)) : ?>

        <form method="post" enctype="multipart/form-data">

            <h5 style="font-size: 30px;" class="text-dark"><i class="fa fa-hamburger"></i> Delete Announcement</h5>

            <div class="alert alert-danger text-center">Are you sure you want to delete this Announcemet???!!</div>

            <div class="mb-3">
                <label for="titleControlInput1" class="form-label">Title</label>
                <input disabled value="<?= set_value('title', $row['title']) ?>" name="title" type="text" class="form-control <?= !empty($errors['title']) ? 'border-danger' : '' ?>" id="productControlInput1" placeholder="Product title">
                <?php if (!empty($errors['title'])) : ?>
                    <small class="text-danger"><?= $errors['title'] ?></small>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="bodyControlInput1" class="form-label">Body</label>
                <input disabled value="<?= set_value('body', $row['body']) ?>" name="body" type="text" class="form-control <?= !empty($errors['body']) ? 'border-danger' : '' ?>" id="productControlInput1" placeholder="Product body">
                <?php if (!empty($errors['body'])) : ?>
                    <small class="text-danger"><?= $errors['body'] ?></small>
                <?php endif; ?>
            </div>


            <br>
            <button style="background-color:#335500;color:white;" class="btn float-end">Delete</button>
            <a href="index.php?pg=admin&tab=announcement">
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