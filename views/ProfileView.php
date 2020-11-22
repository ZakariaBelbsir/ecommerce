<?php
$title = 'Profile';
require ('functions/notifications.php');
ob_start();
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
?>
    <h4 class="navbar-brand name">
        <a href="profile.php" class="text-white nav-link">My Shop</a>
    </h4>
<?php
    $home = ob_get_clean();
    require ('templates/header.php');
ob_start();
?>
    <h1 class="text-center text-dark my-2"> Our Most Sold Products </h1>
    <div class="carousel slide mb-4" data-ride="carousel">
        <div class="carousel-inner">
        <?php
        $i = 1;
        $class='';
        if($prod){
            // display 2 carousel items
            foreach (array_chunk($prod, 3) as $product){
                if(count($product)!=3)
                    $class = 'justify-content-center';
                ?>
                <div class="carousel-item <?=
                $i==1? "active" :""
                ?>" data-interval="10">
                    <div class="row <?= $class?$class: '' ?>">
                        <?php

                        foreach ($product as $p) {
                        ?>
                        <div class="col-sm-4" style="height: 250px">
                            <a href="view_product.php?p=<?= $p['productId']?>">
                                <div class="card" ">
                                <img style="height: 200px;" src="<?= $p['pictures'] ?>" class="card-img-top">
                                <div class="card-body bg-light">
                                    <h5 class="card-text"><?= $p['name'] ?></h5>
                                </div>
                        </div>
                        </a>
                    </div>
                    <?php
                    }
                    $i++;
                    $class='';
                    ?>
                </div> <!--fin row-->
                </div> <!-- fin carousel-item -->
                <?php

            }
        }
        ?>
        </div> <!-- fin carousel-inner -->
    </div> <!-- fin carousel-slide -->
<?php
$side = ob_get_clean();
require('templates/sidebar.php');
?>

    <div class="row">
        <div class="col-lg-1"></div>
        <div class="text-center col-lg-11">
            <img src="public/img/buyer-protection.png" id="imghome" alt="">
        </div>
    </div>

<?php
require('templates/footer.php');
?>