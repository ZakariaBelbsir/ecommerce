<?php
$title = 'Product';
?>

<?php
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
require('functions/notifications.php');
?>

<div class="row mt-5">
    <div class="col-sm-2"></div>
    <div class="cl-sm">
<a href="listings.php" class="btn btn-light"><< Go back</a>
</div>
</div>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="card col-sm-8">
        <div class="row">
            <div class="card-header bg-primary text-white col-sm-12">
                <div class="row">
                        Viewing product
                </div>
            </div>
        </div>

            <?php
            if($result) {
                ?>
                <div class="row">
                    <div class="col-sm-8">
                            <table class="col-sm-12 my-5" border>
                                <tr class="bg-secondary text-light">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                </tr>
                                <tr>
                                    <td><?=$result->productId ?></td>
                                    <td><?=$result->name ?></td>
                                    <td><?=$result->price ?></td>
                                    <td><?=$result->quantity ?></td>
                                </tr>
                            </table>
                    </div>
                    <div class="col-sm-3 border my-1">
                        <img src="<?=$result->pictures ?>"  width="200" height="200" alt="">
                    </div>
                </div>

                <?php
            }
            ?>

<?php
require ('templates/footer.php');
?>
