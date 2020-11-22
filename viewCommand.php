<?php
session_start();
require('includes.php');
$prod = [];
if(isset($_GET['ref']) && !empty($_GET['ref'])) {
    $commandDetails = $bd->prepare("select * from shoppingCart where userId=? and  commandRef=?");
    $commandDetails->execute([$_SESSION['id'], $_GET['ref']]);
    $userCommandDetails = $commandDetails->fetchAll(PDO::FETCH_OBJ);
    foreach ($userCommandDetails as $userCommandDetail){
        $getProduct = $bd->prepare("select name from products where productId=?");
        $getProduct->execute([$userCommandDetail->productId]);
        $getProduct = $getProduct->fetchAll(PDO::FETCH_ASSOC);
        array_push($prod, $getProduct);
    }
}
else {
    header("location: index.php");
    exit();
}
require("views/commandDetails.php");