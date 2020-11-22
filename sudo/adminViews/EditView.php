<?php
$title = 'Edit product';
require ('includes/header.php');
ob_start();
?>

    <div class="row">

    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="card my-2">
                    <a href="productsList.php" class="text-right">
                        <button class="btn btn-danger"><i class="fas fa-backward"></i> Go Back</button>
                    </a>
            <h3 class="card-header text-primary text-center">
                <div class="col-sm-12 text-center">
                    Edit Product
                </div>
            </h3>
        </div>
    <div>
                <form action="" method="post" enctype="multipart/form-data" class="my-3 p-2" data-parsley-validate>
                    <div class="form-group">
                        <label for="prod">Product name: </label>
                        <input type="text" data-parsley-minlength="6" value="<?=$p->name?>"  data-parsley-required="true" data-parsley-trigger="keyup" id="prod" name="prod" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="desc">Product description: </label>
                        <textarea type="text" id="desc" data-parsley-required="true"  data-parsley-trigger="keyup" name="desc" class="form-control"><?=$p->description?></textarea>
                    </div>
                    <div class="row ml-auto text-center">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="price">Price in USD: </label>
                                <input type="text" id="price" data-parsley-required="true" value="<?= $p->price?>" data-parsley-trigger="keyup" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="quantity">Quantity: </label>
                                <input type="text" id="quantity" name="quantity" value="<?= $p->quantity?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="category">Product category: </label>
                                <select name="category" id="category" class="form-control">
                                    <?php
                                    if(isset($product_categories)) {
                                        foreach ($product_categories as $cat) {
                                            ?>
                                            <option value='<?= $cat->category ?>'
                                                <?=
                                                $p->category == $cat->category? "selected=\"selected\"": ''
                                                ?> ><?= $cat->category ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ml-3">
                        <label for="pictures" class="btn btn-info col-sm-2"><img src="../public/img/plus.png" width="80px" height="80px"></label>
                        <input type="file" class="ml-0" id="img" name="img" >
                    </div>
                    <div class="invisible">
                        <?=$p->pictures ;?>
                    </div>
                    <div class="text-center col-sm-12">
                        <button class="btn btn-secondary" type="submit" id="update" name="update">Update Product</button>
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