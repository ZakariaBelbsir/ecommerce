<?php
$title = 'My Account';
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
        <div class="card my-2">
            <h3 class="card-header text-primary text-center">
                <div class="col-sm-12 text-center ">
                    Personal informations
                </div>
            </h3>
        <div class="border border-secondary my-2">
            <form action="" method="post" class="my-3 p-2">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" data-parsley-minlength="6" value="<?= $name_db? $name_db:''; ?>" data-parsley-required="true" data-parsley-trigger="keyup" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Phone: </label>
                    <input type="tel" id="phone" value="<?= $phone_db?$phone_db:''; ?>" data-parsley-required="true" data-parsley-trigger="keyup" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="adress">Adress: </label>
                    <input type="text" id="adress" value="<?= $adress_db?$adress_db:'' ?>" data-parsley-required="true" data-parsley-trigger="keyup" name="adress" class="form-control">
                </div>
                <div class="row">
                <div class="col-sm-4">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" value="<?= $city_db?$city_db:'' ; ?>" class="form-control">
                </div>
                </div>
                    <div class="col-sm-4">
                        <label for="zip">Zip Code</label>
                        <input type="text" name="zip" id="zip" class="form-control" value="<?= $zip_db?$zip_db:'' ;?>">
                    </div>
                <div class="col-sm-4">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" value="<?= $country_db?$country_db:'' ;?>" class="form-control">
                </div>
                </div>
                <div class="text-center col-sm-12">
                    <button class="btn btn-secondary" type="submit" id="save" name="save">Update Personal Informations</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<?php
require ('functions/notifications.php');
require ('templates/footer.php');
?>
