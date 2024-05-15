<div id="page-content-wrapper">
    <div class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-gift secondary-text fs-4 me-3" id="menu-toggle"></i>
            <h1 class="fs-1 m-0">Category</h1>
        </div>
    </div>

    <div class="table-responsive mx-4 mx-4 shadow-lg p-3 mb-5 bg-body rounded  bg-white">

        <table id="categoriesTable" class="table table-striped table-hover ">
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Action</th>
            </tr>

            <?php if (!empty($categories)) : ?>
                <?php $counter = 1; ?>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?= $counter++ ?></td> <!-- Idadagdag ang counter dito para sa numbering -->
                        <td><?= esc($category['category_name']) ?></td>
                        <td>
                            <a href="index.php?pg=category-delete&id=<?= $category['id'] ?>">
                                <button style="background-color:#335500" class="btn text-white btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>


        </table>
    </div>