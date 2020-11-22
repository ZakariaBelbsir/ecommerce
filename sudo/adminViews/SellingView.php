<?php
    $title = "Add Product";
    require ('includes/header.php');
    ob_start();
    ?>
<body>
<div class="row justify-content-center">
    <div class="card my-3 col-sm-8">
        <a href="productsList.php" class="text-right">
            <button class="btn btn-danger"><i class="fas fa-backward"></i> Go Back</button>
        </a>
        <h3 class="card-header text-primary  text-center">
            <div class="col-sm-12 text-center">Add Product</div>
        </h3>
        <div>
            <form action="" method="post" enctype="multipart/form-data" class="my-3 p-2">
                <div class="form-group">
                    <label for="prod">Product name: </label>
                    <input type="text"  value="" id="prod" name="prod" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc">Product description: </label>
                    <textarea type="text" id="desc" name="desc" class="form-control"></textarea>
                </div>
                <div class="row ml-auto text-center">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="price">Price in USD: </label>
                            <input type="text" id="price" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="quantity">Quantity: </label>
                            <input type="text" id="quantity" name="quantity" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="category">Product category: </label>
                            <select name="category" id="category" class="form-control">
                                <?php
                                foreach ($product_categories as $product_category) {
                                    ?>
                                    <option value="<?=$product_category->category ?>"><?=$product_category->category?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group ml-3">
<!--                    <label for="img" class="btn btn-outline-primary col-sm-2"><img src="../public/img/plus.png" width="80px" height="80px"></label>-->
                    <label for="img">Choose Picture: </label>
                    <input type="file" class="ml-0" id="img" name="pic" >
                </div>
                <div class="text-center row my-3">
                    <div class="col-sm-4"></div>
                    <div class="g-recaptcha col-sm-6"  data-sitekey="6LdSnZkUAAAAAOqwNqemwvyEaKedMZ2nxawqek33"></div>
                </div>
                <div class="text-center col-sm-12">
                    <button class="btn btn-secondary" type="submit" id="add" name="add">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$main=ob_get_clean();
require ('includes/nav.php');
?>
</div>
<script src="public/js/jquery.js"></script>
<script src="public/js/popper.js"></script>
<script src="public/js/bootstrap.js"></script>
<script src="external/parsley/parsley.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>