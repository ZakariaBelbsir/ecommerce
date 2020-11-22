<?php
session_start();
require ('includes.php');
require ('remember.php');

if(isset($_GET['prod']) && !isset($_GET['cart'])) {
    $query = $bd->prepare('delete from products where productId = ?');
    $query->execute([$_GET['prod']]);
}
if(isset($_GET['cart']) && isset($_GET['prod'])){
    $sql = $bd->prepare("delete from cart where userId=? and productId=?");
    $sql->execute([$_SESSION['id'], $_GET['prod']]);
    header("location:cart.php");
    exit();
}
if(isset($_GET['empty'])){
    $sql = $bd->prepare("delete  from cart where userId=?");
    $sql->execute([$_SESSION['id']]);
    header("location:cart.php");
    exit();
}
header('location: listings.php');