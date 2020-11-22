<?php
$title = 'Home';
?>
<?php
ob_start();
?>
<a href="index.php" class="navbar-brand name">My Shop</a>
<?php
$ecommerce = ob_get_clean();
ob_start();
?>

        <li class="nav-item">
            <a href="login.php" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
            <a href="Register.php" class="nav-link">Signup</a>
        </li>
<?php
    $form = ob_get_clean();
    ob_start();
    ?>
<h4 class="navbar-brand name"><a href="index.php" class="text-white nav-link">My Shop</a></h4>
<!--    <li class="nav-item">-->
<!--        <a href="index.php" class="nav-link">Home</a>-->
<!--    </li>-->
<?php
    $home = ob_get_clean();
    require ('templates/header.php');
    require ('functions/notifications.php');
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
                                <a href="view_product.php?p=<?= $p['productId']?>" class="text-center justify-content-center">
                                    <div class="card">
                                        <img style="height: 200px;" src="<?= $p['pictures'] ?>" class=" card-img-top">
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


</div>
<script src="public/js/jquery.js"></script>
<script src="public/js/popper.js"></script>
<script src="public/js/bootstrap.js"></script>
<script>
    $(document).ready(function(){
        $('.carousel').carousel({
            interval: 2500
        });
</script>
<script src="public/js/livesearch.js"></script>
</body>
</html>