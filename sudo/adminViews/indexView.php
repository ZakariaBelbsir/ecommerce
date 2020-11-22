<?php
$title = "Login"
?>
<body class="bg-warning">
    <div class="container">
        <h1 class="text-center indexTitle mt-3 ml-5">Welcome Admin</h1>
        <form action="" method="post" class="p-3 mt-5 offset-3 col-sm-8">
            <div class="form-group offset-2 mt-5 col-sm-6">
                <label for="email">Email: </label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group offset-2 mt-5 col-sm-6">
                <label for="pw">Password: </label>
                <input type="password" id="pw" name="pw" class="form-control">
            </div>
            <div class="offset-6">
                <button class="btn btn-success " type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
</body>
<?php
require ('includes/header.php');
?>
</html>
