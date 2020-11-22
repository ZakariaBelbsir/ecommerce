<?php
session_start();
require ('includes.php');
$prod=[];
$CART=[];
$query = $bd->prepare("select * from shoppingCart where userId=? and complete=0");
$query->execute([$_SESSION['id']]);
while ($cart = $query->fetch(PDO::FETCH_OBJ)){
//    print_r($cart);
    $sel = $bd->prepare('select * from products where productId=?');
    $sel->execute([$cart->productId]);
    while($product=$sel->fetch(PDO::FETCH_ASSOC)){
        array_push($prod, $product);
    }

    array_push($CART, $cart);
}

require ('views/CartView.php');
