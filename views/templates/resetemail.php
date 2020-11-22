<?php
// open session to recover token
//session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou" rel="stylesheet">
    <title>Verify your account</title>
</head>
<body>
    <div class="container mail">
        <div class=" p-2 m-2 col-sm-6 border border-2">
        <div class="row">
            <div class="col-sm-3"></div>
            <h1 class="text-center text-info mx-4 my-3">Reset Your Password</h1>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <p class="text-center text-secondary"> Please Click the link below to reset your password! </p>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <a href="http://localhost/Projet/reset.php?p=<?php echo $_POST['email'].'&token='.$_SESSION['token']?>">
                <button class="btn btn-primary">
            Reset your password</button></a>
        </div>
        </div>
    </div>
</body>
</html>