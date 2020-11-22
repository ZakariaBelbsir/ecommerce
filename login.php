<?php
session_start();
require ('Database/db.php');
require('functions/UserFunctions.php');
require ('remember.php');
if(isset($_POST['login']) && !isset($_GET['p'])) {

//    extract($_POST);

    //Selecting users
    $query = $bd->prepare('select * from users where email=? and password=?');
    $query->execute([$_POST['Email'], md5($_POST['PW'])]);
    $count = $query->rowCount();
    $result = $query->fetch(PDO::FETCH_OBJ);

    // Verifying if the info provided exists in database

    if ($count != 1) {
        $error = 'Please verify your informations and try again!';
    }

    // Verifying if the account is activated
    else{
        if ($result->active == 0)
            $error = 'You need to activate your account first!';
        else {
            $_SESSION['email'] = $_POST['Email'];
            $_SESSION['id'] = $result->userId;
            header('location:profile.php?p=' . $_POST['Email']);
            exit();
        }
    }
}
else if(isset($_POST['login']) && isset($_GET['p'])) {

//    extract($_POST);

    $sql = $bd->prepare('select * from users where email=? and password=?');
    $sql->execute([$_POST['Email'], md5($_POST['PW'])]);
    $num = $sql->rowCount();
    $result = $sql->fetch(PDO::FETCH_OBJ);

    // Verifying if the info provided exists in database
    if ($num!= 1) {
        $error = 'Please verify your informations and try again!';
    }

    // Verifying if the account is activated
    else{
        if ($result->active == 0)
            $error = 'You need to activate your account first!';
        else {
            print_r($result);
            $_SESSION['email'] = $_POST['Email'];
            $_SESSION['id'] = $result->userId;
            header('location:view_product.php?p=' . $_GET['p']);
            exit();
        }
    }
}

require('views/LoginView.php');