<?php
$title = "Command: ". $_GET['ref'];
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
ob_start();
?>
<h4 class="navbar-brand name">
    <a href="profile.php" class="text-white nav-link">My Shop</a>
</h4>
<?php
$home=ob_get_clean();
require ('templates/header.php');
require ('functions/notifications.php');
?>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <table class="table mt-2 table-bordered table-primary">
            <thead class="text-info">
            <tr>
                <th>product </th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=0;
            $finalPrice=0;
            if($userCommandDetails) {
            if ($prod) {
                foreach ($prod as $product) {
//                    print_r($product);
                    ?>
                    <tr>
                        <td><?= $product[0]['name']?></td>
                        <td><?= $userCommandDetails[$i]->price ?></td>
                        <td><?=$userCommandDetails[$i]->quantity?></td>
                    </tr>
                    <?php
                    $finalPrice+= $userCommandDetails[$i]->price;
                    $i++;
                }
            }
            ?>
            <tr>
                <td colspan="2" class="text-right">Final Price : </td>
                <td><?=$finalPrice ?></td>
            </tr>
            </tbody>
        </table>
        <?php
        }
        ?>
    </div>
</div>
<?php
require ('functions/notifications.php');
require ('templates/footer.php');
?>
