<?php
session_start();
require ('../Database/db.php');
if(isset($_POST['login'])){
    $getAdmin = $bd->prepare("select * from admins where email=? and password=?");
    $getAdmin->execute([$_POST['email'], $_POST['pw']]);
    $count = $getAdmin->rowCount();
    if($count==1){
        $_SESSION['email'] = $_POST['email'];
        header("location: dashboard.php");
        exit();
    }
}
require ('adminViews/indexView.php');