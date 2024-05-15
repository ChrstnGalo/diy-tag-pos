<div id="page-content-wrapper">
    <div class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-shopping-cart secondary-text fs-4 me-3" id="menu-toggle"></i>
            <h1 class="fs-1 m-0">Announcements</h1>
        </div>
    </div>

</div>


<div class="table-responsive mx-4 shadow-lg p-3 mb-5 bg-body rounded  bg-white">

    <table id="announcementTable" class="table table-striped table-hover">

        <tr>
            <th>Title</th>
            <th>Body</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($announcements)) : ?>
            <?php foreach ($announcements as $announcement) : ?>
                <tr>
                    <td><?= esc($announcement['title']) ?></td>
                    <td><?= esc($announcement['body']) ?></td>
                    <td>
                        <a href="index.php?pg=announcement-edit&id=<?= $announcement['id'] ?>">
                            <button style="background-color:#8BAE22" class="btn text-white btn-sm">Edit</button>
                        </a>
                        <a href="index.php?pg=announcement-delete&id=<?= $announcement['id'] ?>">
                            <button style="background-color:#335500" class="btn text-white btn-sm">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

</div>