<?php
$title = 'Edit category';
require ('includes/header.php');
ob_start();
?>

    <div class="row">

        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card my-2">
                <a href="categoriesList.php" class="text-right">
                    <button class="btn btn-danger"><i class="fas fa-backward"></i> Go Back</button>
                </a>
                <h3 class="card-header text-primary text-center">
                    <div class="col-sm-12 text-center">
                        Edit Category
                    </div>
                </h3>
            </div>
            <div>
                <form action="" method="post" enctype="multipart/form-data" class="my-3 p-2" data-parsley-validate>
                    <div class="form-group">
                        <label for="cat">Category Name: </label>
                        <input type="text" value="<?=$category->category?>"  id="cat" name="cat" class="form-control">
                    </div>
                    <div class="text-center col-sm-12">
                        <button class="btn btn-secondary" type="submit" id="update" name="update">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
$main = ob_get_clean();
require ('includes/nav.php');
require('includes/footer.php');

?>