<?php
$title = 'Password reset';
?>
<?php ob_start();
?>
<li class="nav-item">
    <a href="login.php" class="nav-link">Login</a>
</li>
<li class="nav-item">
    <a href="Register.php" class="nav-link">Signup</a>
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
    <a href="index.php" class="text-white nav-link">My Shop</a>
</h4>

<?php
$home = ob_get_clean();
require ('templates/header.php');
require ('functions/notifications.php');
?>
<div class="row text-center">
    <div class="col-sm-2"></div>
<div class="col-sm-8 mt-5">
    <form action="" method="post">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                <label for="password">New password: </label>
                    <input type="password" placeholder="New password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="confirm">Confirm new password: </label>
                    <input type="password" placeholder="Confirm new password" name="confirm" id="confirm" class="form-control">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="reset" id="reset">Reset Password</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<?php

require('templates/footer.php');
?>
