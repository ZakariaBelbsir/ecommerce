<?php
$title = $product->name;
ob_start();
if(isset($_SESSION['email'])){
    ?>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            My account
        </a>
        <div class="dropdown-menu">
            <a href="account.php" class="dropdown-item">My Account</a>
            <a href="orders.php" class="dropdown-item">My Orders</a>
<!--            <a href="listings.php" class="dropdown-item">Listings</a>-->
<!--            <a href="selling.php" class="dropdown-item">Sell</a>-->
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
} else {
    ?>
    <li class="nav-item">
        <a href="login.php" class="nav-link">Login</a>
    </li>
    <li class="nav-item">
        <a href="Register.php" class="nav-link">Signup</a>
    </li>

    <?php
    $form = ob_get_clean();
}
    ob_start();
if(isset($_SESSION['email'])){
    ?>
    <h4 class="navbar-brand name">
        <a href="profile.php" class="text-white nav-link">My Shop</a>
    </h4>
    <?php
    $home = ob_get_clean();
} else{
    ?>
    <h4 class="navbar-brand name">
        <a href="index.php" class="text-white nav-link">My Shop</a>
    </h4>
    <?php
    $home = ob_get_clean();
}
    require ('templates/header.php');
    require ('functions/notifications.php');
?>

<?php
ob_start();
?>
    <div class="row cart">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 text-center">
            <?php
            if ($fail != "")
            {
                ?>
                <div class="alert alert-danger text-center alert-dismissible fade show col-sm-12" role="alert">
                    <strong><?= $fail ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            } if($success != ""){
                ?>
                <div class="alert alert-success text-center alert-dismissible fade show col-sm-12" role="alert">
                    <strong><?= $success ?> <br>
                        <a href="cart.php" class="text-warning text-center">Go to cart? </a></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
        </div>
        </div>
        <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">
                    <div class="card my-2">
                        <h3 class="card-header text-primary text-center">
                            <div class="col-sm-12">
                                <?=$product->name;?>
                            </div>
                        </h3>
                        <div class="col-sm-12 text-center bg-secondary">
                        <img style="width: 500px" src="<?=$product->pictures?>">
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-2">
                                Available quantity: <?= $product->quantity ?>
                            </div>
                            <div class="col-md-6 text-right">
                                Price: <?= $product->price ." USD" ?>
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION['email'])) {
                            if ($product->quantity > 0) {
                                ?>
                                <form action="" class="prodForm" method="post">
                                    <div class="row">
                                        <div class="col-md-4 ml-2">
                                            Quantity:
                                            <select name="quantity" id="quantity">
                                                <?php
                                                for ($i = 1; $i <= $product->quantity; $i++)
                                                    echo '<option value=' . $i . '>' . $i . '</option>'
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            Final Price:
                                            <input type="text" value="" id="finalPrice" readonly="true"
                                                   name="finalPrice">
                                        </div>
                                    </div>

                                    <div class="row mt-5">
<!--                                        <div class="col-md-2"></div>-->
                                        <div class="col-sm-10 text-right mr-2">
                                            <button class="btn btn-warning" type="submit" id="add" name="add">Add to
                                                cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            } else{
                                ?>
                                <div class="alert alert-secondary alert-dismissible text-center">Currently out of stock</div>
                                <?php
                            }
                        }
                            else{
                        ?>
                                <div class="alert alert-primary text-dark text-center">
                                    <div>You need to be connected to buy or add this item to your cart</div>
                                    <div class="text-center"><a href="login.php?p=<?= $product->productId?>">Login?</a></div>
                                </div>

                        <?php
                                }
                        ?>
                    <div>
                  </div>
            </div>
   </div>
<?php
$side = ob_get_clean();
require('templates/sidebar.php');
?>
        </div>
        <script src="public/js/jquery.js"></script>
        <script src="public/js/popper.js"></script>
        <script src="public/js/bootstrap.js"></script>
        <script src="external/parsley/parsley.min.js"></script>
        <script>
            $(function(){
                $('#finalPrice').attr("value", <?=$product->price?>);
                $("#quantity").change(function () {
                    var q = $("#quantity option:selected").text();
                    var fq = parseInt(q);
                    $('#finalPrice').attr("value",  fq * <?=$product->price?>);
                });
            });
        </script>
        <script src="public/js/livesearch.js"></script>
    </body>
</html>