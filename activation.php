<?php
session_start();
require ('Database/db.php');
require ('functions/UserFunctions.php');
// checking if email and token are passed as params in the activation url and if the email is lready user
if(isset($_GET['p']) && isset($_GET['token']) && is_already_in_use('email', $_GET['p'], 'users')){

    echo "IN CONDITION";
    //
    $q = $bd->prepare('select * from users where email = ?');
    $q->execute(array($_GET['p']));
    $data = $q->fetch(PDO::FETCH_OBJ);
    // creating new token to verify that the user is using right url
    $token = md5($data->name.$_GET['p'].$data->password);
    // comparing tokens
    if($token == $_GET['token']) {
        $update = $bd->prepare('update users set active=? where email =?');
        $update->execute(array('1', $_GET['p']));
        setNotification('Your account was activated successfully', "info");
        header('location: login.php');
    }
//    else{
//        setNotification("An error has occured, please try again later", 'danger');
//        header('location: index.php');
//    }
}

//else
//    header('location: index.php');