<?php
$title = 'My listings';
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
<!--        <a href="listings.php" class="dropdown-item">Listings</a>-->
<!--        <a href="selling.php" class="dropdown-item">Sell</a>-->
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
    <h4 class="navbar-brand name"><a href="profile.php" class="text-white nav-link">My Shop</a></h4>
<?php
$home=ob_get_clean();
require('templates/header.php');
require('functions/notifications.php');
?>
<div class="row my-5">
    <div class="col-sm-2"></div>
<div class="card col-sm-8">
    <div class="row">
    <div class="card-header bg-primary text-white col-sm-12">
        <div class="row">
        <div class="col-sm-8">
        My products
        </div>
        <div class="col-sm-4 text-right">
            <a href="selling.php"><button class="btn btn-secondary text-primary">Add product</button></a>
        </div>
        </div>
    </div>
    </div>

    <table class="text-info">

        <tr>
            <th>Product ID</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach ($prods as $prod) {
            ?>
            <tr>
                <td><?= $prod->productId ?></td>
                <td><?= $prod->name ?></td>
                <td><?= $prod->price ?></td>
                <td><?= $prod->quantity ?></td>
                <td><a href="edit.php?prod=<?= $prod->productId?>"><i class="fas fa-edit text-info" data-toggle="tooltip" data-placement="top"
                                  title="Edit"></i></a>
                    <a href="delete.php?prod=<?= $prod->productId?>"><i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top"
                                  title="Delete"></i></a>
                    <a href="show.php?prod=<?= $prod->productId?>"><i class="fas fa-eye text-primary" data-toggle="tooltip" data-placement="top"
                                  title="Show"></i></a>
                </td>
            </tr>
            <?php

        }
        ?>
    </table>
</div>
</div>







<?php
require('templates/footer.php');
?>