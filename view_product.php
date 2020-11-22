<?php
session_start();
require ('functions/cart.php');
require ('Database/db.php');
require ('functions/UserFunctions.php');
require ('functions/notifications.php');
$success="";
$fail="";
if(isset($_GET['p']) && !empty($_GET['p'])) {
    $query = $bd->prepare('select * from products where productId=?');
    $query->execute([$_GET['p']]);
    $product = $query->fetch(PDO::FETCH_OBJ);
    }
else{
    header('location: index.php');
}
if(isset($_POST['add'])) {
    $sel = $bd->prepare('select * from shoppingCart where userId=? and productId=? and complete=?');
    $sel->execute([$_SESSION['id'], $_GET['p'], 0]);
    $response = $sel->fetch();
//    addToCart($_SESSION['id'], $_GET['p'], $_POST['quantity'], $_POST['finalPrice']);
//    print_r($response);
    if (!$response) {
        addToCart($_SESSION['id'], $_GET['p'], $_POST['quantity'], $_POST['finalPrice']);
        $success = "Product was added successfully to your cart";
    }
    else {
        $fail = "The same product cannot be added to cart more than once";
    }
}

require ('views/viewProductView.php');