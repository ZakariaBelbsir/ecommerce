<?php
$title='Register';
require ('functions/notifications.php');
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
<h4 class="navbar-brand name">
    <a href="index.php" class="text-white nav-link">My Shop</a>
</h4>

<?php
$home = ob_get_clean();
require ('templates/header.php');
require ('functions/notifications.php');
?>
<div class="row ">
    <div class="col-sm-4"></div>
    <div class="col-sm-8 text-center">
    <?php
    if (isset($errors) && count($errors)!=0)
    { ?>
        <div class="alert alert-danger alert-dismissible fade show col-sm-6" role="alert">
            <strong>ERROR !</strong>
            <?php foreach($errors as $error)
                echo $error.'<br/>';
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-center text-primary">
        <a href="index.php"><h1 class="name">My Shop</h1></a>
    </div>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="border border-info my-2">
            <div class="alert alert-secondary">
                Signup
            </div>
            <form action="" method="post" class="my-3 p-2" data-parsley-validate>
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" data-parsley-minlength="6" data-parsley-required="true" data-parsley-trigger="keyup" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" id="email" data-parsley-required="true" data-parsley-trigger="keyup" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="PW">Password: </label>
                    <input type="password" id="PW" data-parsley-required="true" data-parsley-trigger="keyup" name="PW" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cpw">Confirm password</label>
                    <input type="password" id="cpw" data-parsley-required="true" data-parsley-trigger="keyup" data-parsley-equalto="#PW" name="cpw" class="form-control">
                </div>
                <div class="text-center col-sm ml-4">
                    <div class="g-recaptcha col-sm-10"  data-sitekey="6LdSnZkUAAAAAOqwNqemwvyEaKedMZ2nxawqek33"></div>
                </div>
                <div class="text-center col-sm-12 my-2">
                    <button class="btn btn-info" type="submit" id="register" name="register">Register</button>
                </div>
            </form>
            <div class="text-center">
                <hr>
                Already have an account?
                <hr>
                <a href="login.php" ><button class="px-5 mb-2 btn btn-info">Login</button></a>
            </div>
        </div>
    </div>
</div>


</div>
<script src="public/js/jquery.js"></script>
<script src="public/js/popper.js"></script>
<script src="public/js/bootstrap.js"></script>
<script src="external/parsley/parsley.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>