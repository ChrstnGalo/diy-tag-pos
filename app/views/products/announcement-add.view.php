    <?php require views_path('partials/header'); ?>

    <div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

        <form method="post" enctype="multipart/form-data">

            <h5 style="font-size: 30px;" class="text-dark"><i class="fa-solid fa-list"></i> Post Announcement</h5>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control <?= !empty($errors['title']) ? 'border-danger' : '' ?>" id="titleControlInput1" placeholder="Post Announcement Title" value="<?= $_POST['title'] ?? '' ?>">
                <?php if (!empty($errors['title'])) : ?>
                    <small class="text-danger"><?= $errors['title'] ?></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Body</label>
                <textarea name="body" class="form-control" <?= !empty($errors['body']) ? 'border-danger' : '' ?> id="bodyFormControlTextarea1" value="<?= $_POST['body'] ?? '' ?>" rows="3"></textarea>
                <?php if (!empty($errors['body'])) : ?>
                    <small class="text-danger"><?= $errors['body'] ?></small>
                <?php endif; ?>
            </div>

            <button style="background-color:#335500;color:white;" class="btn float-end">Save</button>
            <a href="index.php?pg=admin&tab=announcement">
                <button style="background-color:#8BAE22;color:white;" type="button" class="btn">Cancel</button>
            </a>
        </form>
    </div>

    <?php require views_path('partials/footer'); ?>