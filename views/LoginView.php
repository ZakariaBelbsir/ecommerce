<?php
$title='Login';
?>

<?php
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

<?php
$home = ob_get_clean();
require ('templates/header.php');
require ('functions/notifications.php');
?>
    <div class="row">
        <div class="col-sm-4"></div>
        <?php
        if (isset($error))
        { ?>
            <div class="col-sm-8 text-center">
                <div class="alert alert-danger alert-dismissible fade show col-sm-6" role="alert">
                    <strong>ERROR!</strong>
                    <?php
                    echo $error;
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

<div class="row">
    <div class="col-sm-12 text-center text-primary">
        <a href="index.php"><h1 class="name">My Shop</h1></a>
    </div>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 border border-info my-4">
        <div class="row">
            <div class="col-sm-12 alert alert-secondary text-center">
                Login
            </div>
        </div>
        <form class="my-3  p-2" action="" method="post">
            <div class="form-group">
                <label for="Email">Email: </label>
                <input type="email" id="Email" name="Email" class="form-control">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="PW">Password: </label>
                    </div>
                </div>
                <input type="password" name="PW" id="PW" class="form-control">
            </div>
            <div class="text-center">
                <button class="btn btn-info px-5" type="submit" id="login" name="login">Login</button>
            </div>
            <div class="form-group mx-4">
                <input type="checkbox" id="keep" name="keep" class="form-check-input">
                <label for="keep">Keep me logged in</label>
            </div>
            <div class="row mx-2">
            <a href="forgot.php" class="">Forgot your password?</a>
            </div>
        </form>
        <hr>
        <div class="text-center my-2">
            <span >New member?</span>
        </div>
        <hr>
        <div class="text-center my-2">
            <a href="Register.php"><button class="btn btn-info px-5" id="reg" name="reg">Create new account</button>
            </a>
        </div>
    </div>
</div>

<?php
require('templates/footer.php');
?>