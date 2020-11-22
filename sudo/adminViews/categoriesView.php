<?php
$title = "Categories";
require ('includes/header.php');
ob_start();
?>
<body>
<div class="container">
    <div class="row justify-content-end">
        <a href="addCategory.php"><button class="my-3 btn btn-success">New</button></a>
    </div>
    <table class=" table table-striped my-3 text-center">
        <thead>
        <tr>
            <th>Category ID</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        <tbody>
        <?php
        foreach ($categoriesList as $category) {
            ?>
            <tr>
                <td><?=$category->categoryId?></td>
                <td><?=$category->category?></td>
                <td>
                    <a href="editCategory.php?p=<?=$category->categoryId ?>"><i class="fas fa-edit"></i></a>
                    |
                    <a href="deleteCategory.php?p=<?=$category->categoryId ?>"><i class="text-danger fas fa-trash"></i></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </thead>
    </table>

    <?php
    $main = ob_get_clean();
    require ('includes/nav.php');
    ?>
</div>
</body>


<?php
require ('includes/footer.php');
?>
