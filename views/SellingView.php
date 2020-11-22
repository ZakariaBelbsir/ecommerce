<?php
$title = 'Sell';
ob_start();
?>
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        My account
    </a>
    <div class="dropdown-menu">
        <a href="account.php" class="dropdown-item">My Account</a>
        <a href="orders.php" class="dropdown-item">My Orders</a>
        <a href="listings.php" class="dropdown-item">Listings</a>
        <a href="selling.php" class="dropdown-item">Sell</a>
        <a href="logout.php" class="dropdown-item">Sign Out</a>
    </div>
</li>
<li class="nav-item">
    <a href="cart.php" class="nav-link">
        <i class="fas fa-shopping-cart"></i>
    </a>
</li>

<?php
$form = ob_get_clean();
ob_start();
?>
<li class="nav-item">
    <a href="profile.php" class="nav-link">Home</a>
</li>
<?php
$home=ob_get_clean();
require ('templates/header.php');
require ('functions/notifications.php');
?>
    <div class="row">

    <div class="col-sm-2"></div>
    <div class="col-sm-8">
     <div class="card my-2">
     <h3 class="card-header text-primary text-center">
         <div class="col-sm-2"><a href="listings.php" class="btn btn-light"><< Go back</a></div>
         <div class="col-sm-12 text-center">
         Add Product
         </div>
     </h3>
    <div>
        <form action="" method="post" enctype="multipart/form-data" class="my-3 p-2" data-parsley-validate>
            <div class="form-group">
                <label for="prod">Product name: </label>
                <input type="text" data-parsley-minlength="6" value="<?= keepData('prod') ?>"  data-parsley-required="true" data-parsley-trigger="keyup" id="prod" name="prod" class="form-control">
            </div>
            <div class="form-group">
                <label for="desc">Product description: </label>
                <textarea type="text" id="desc" data-parsley-required="true"  data-parsley-trigger="keyup" name="desc" class="form-control"><?= keepData('desc') ?></textarea>
            </div>
            <div class="row ml-auto text-center">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="price">Price in USD: </label>
                        <input type="text" id="price" data-parsley-required="true" value="<?= keepData('price') ?>" data-parsley-trigger="keyup" name="price" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="quantity">Quantity: </label>
                        <input type="text" id="quantity" name="quantity" value="<?= keepData('quantity') ?>" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="category">Product category: </label>
                        <select name="category" id="category" class="form-control">
                            <?php
                            if(isset($product_categories)) {
                                foreach ($product_categories as $category)
                                    echo "<option value='$category->category'>" . $category->category . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group ml-3">
                <label for="img" class="btn btn-outline-primary col-sm-2"><img src="public/img/plus.png" width="80px" height="80px"></label>
                <input type="file" class="ml-0" id="img" name="img" >
            </div>
            <div class="text-center row my-3">
                <div class="col-sm-4"></div>
                <div class="g-recaptcha col-sm-6"  data-sitekey="6LdSnZkUAAAAAOqwNqemwvyEaKedMZ2nxawqek33"></div>
            </div>
            <div class="form-group ml-3">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">I agree to the <a href="terms.php">policy and terms of use </a></label>
            </div>
            <div class="text-center col-sm-12">
                <button class="btn btn-secondary" type="submit" id="add" name="add">Add Product</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>

</div>
<script src="public/js/jquery.js"></script>
<script src="public/js/popper.js"></script>
<script src="public/js/bootstrap.js"></script>
<script src="external/parsley/parsley.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>