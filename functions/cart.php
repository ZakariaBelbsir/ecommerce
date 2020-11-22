<?php
function addToCart($userId, $productId, $quantity, $price){
    global $bd;
    $query = $bd->prepare('insert into shoppingCart set userId=?, productId=?, quantity=?, price=?');
    $query->execute([$userId, $productId, $quantity, $price]);
}