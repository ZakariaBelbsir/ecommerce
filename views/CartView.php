<?php
$title = 'My Cart';
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
require('functions/notifications.php');
?>
    <div class="row my-5">
        <div class="col-sm-2"></div>
        <div class="card col-sm-8">
            <div class="row">
                <div class="card-header bg-primary text-white col-sm-12">
                    <div class="row">
                        <div class="col-sm-8">
                            My Shopping Cart
                        </div>
                        <div class="col-sm-4 text-right">
                            <a href="profile.php"><button class="btn btn-secondary text-primary">Go back to shopping</button></a>
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
                $i=0;
                $finalPrice=0;
                if($prod) {
                foreach ($prod as $cart_product) {
                ?>
                <tr>
                    <td><?= $cart_product['productId'] ?></td>
                    <td><?= $cart_product['name'] ?></td>
                    <td><?= $CART[$i]->price ?></td>
                    <td><?= $CART[$i]->quantity ?></td>

                            <td>
                                <a href="delete.php?prod=<?= $cart_product['productId'] ?>&cart=1"><i
                                        class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top"
                                        title="Delete from cart"></i></a>
                                <a href="view_product.php?p=<?= $cart_product['productId'] ?>"><i class="fas fa-eye text-primary"
                                                                                   data-toggle="tooltip"
                                                                                   data-placement="top" title="View Product"></i></a>
                            </td>
                        </tr>
                    <?php
                    $finalPrice+=$CART[$i]->price;
                    $i++;
                }
                }
                ?>
            </table>
            <div class="row justify-content-end align-items-center mt-5">
                <label for="fp" class="m-2">Final Price: </label>
                <input type="text" class="pl-2 m-2" value="<?= $finalPrice ?>" id="fp" disabled>
                <a href="paypal/checkout.php?price=<?=$finalPrice?>"><button class="btn btn-info text-warning mr-2" type="submit">Check Out with PayPal</button></a>
            </div>
            <div class="row justify-content-end align-items-center mt-2">
                <a href="delete.php?empty"><button class="btn btn-danger mr-2">Empty cart</button></a>
            </div>
        </div>
    </div>







<?php
require ('templates/footer.php');
?>