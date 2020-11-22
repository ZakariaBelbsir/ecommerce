<?php
$title = "Search results" ;
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
ob_start();
if(isset($result) && $result) {
    foreach (array_chunk($result, 3) as $product) {
        echo '<div class="row my-2">';
        foreach ($product as $p) {

            ?>
            <div class="col-sm-4 my-2 justify-content-start" style="height: 250px">
                <a href="view_product.php?p=<?= $p->productId ?>">
                    <div class="card">
                        <img style="height: 200px;" src="<?= $p->pictures ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-text"><?= $p->name ?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        echo '</div>';
    }
    $class = '';
}
else {
    ?>
    <div class="alert alert-danger offset-3 mt-2 text-center" role="alert">
       <h3> The product you're searching for doesn't exist </h3>
    </div>

    <?php
}
$side = ob_get_clean();
require('templates/sidebar.php');
?>

<?php
require ('templates/footer.php');
?>