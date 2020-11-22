<?php
//session_start();
if(isset($_COOKIE['remember_me'])){
    $query = $bd->prepare('select from remember where token=?');
    $query->execute([$_COOKIE['remember_me']]);
    $q = $bd->prepare('select * from users where email=? and password=?');
    $q->execute([$_POST['Email'], md5($_POST['PW'])]);
    $user = $q->fetch(PDO::FETCH_OBJ);
    $_SESSION['email'] = $user->email;
    $_SESSION['id'] = $user->userId;
    $user = $query->fetch(PDO::FETCH_OBJ);
    header('location: profile.php?p=' . $user->email);
    exit();
}