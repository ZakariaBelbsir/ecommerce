<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou" rel="stylesheet">
    <title>Verify your account</title>
    <style>
        .container{
            position: absolute;
            width: 600px;
            left: 50%;
            transform: translate(-50%);
            text-align: center;
            border: 1px solid darkgray;
        }
        h1{
            color: royalblue;
        }
        p{
            color: darkgray;
        }
        button{
            background-color: indianred;
            color: white;
            border-radius: 10px;
            height: 50px;
            border: none;
        }

    </style>
</head>
<body>
    <div class="container mail">
        <div class=" p-2 m-2 col-sm-6 border border-2">
        <div class="row">
            <div class="col-sm-3"></div>
            <h1 class="text-center text-info mx-4 my-3">Ecommerce Account Verification</h1>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <p class="text-center text-secondary"> Please Click the link below to verify your account! </p>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <a href="http://localhost/Projet/activation.php?p=<?php echo $email.'&token='.$_SESSION['token']?>">
                <button class="btn btn-primary">
            Verify your account</button></a>
        </div>
        </div>
    </div>
</body>
</html>