<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/parsley.css">
    <link href="https://fonts.googleapis.com/css?family=Macondo+Swash+Caps" rel="stylesheet">
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title><?= $title;?></title>
</head>
<body class="bg-secondary">
<div class="container-fluid">
    <!-- Top nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary">
<!--        <h4 class="navbar-brand name">My Shop</h4>-->
        <?php
        echo $home;
        ?>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse text-center" id="navbarColor01">
            <ul class="navbar-nav mr-auto col-sm-2">

<!--                <li class="nav-item">-->
<!--                    <a href="contact.php text-" class="nav-link">Contact</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a href="about.php" class="nav-link">About</a>-->
<!--                </li>-->
            </ul>
            <form action="searchedProducts.php" method="post" class="form-inline my-2 my-lg-0 col-sm-8">
                <input type="text" placeholder="Search" id="searchbox" name="searchbox" class="form-control col-md-8 mr-sm-2">
                <button class="btn btn-secondary col-md-2 my-2 my-sm-0"  type="submit" name="submit">Search</button>
                <div class="col-md-8 mr-sm-2" id="searchresult"></div>
            </form>
            <ul class="navbar-nav mr-auto">
                <?php
                echo $form;
                ?>
            </ul>
        </div>
    </nav>






