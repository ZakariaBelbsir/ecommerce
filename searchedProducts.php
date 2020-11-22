<?php
session_start();
require ('Database/db.php');
if(isset($_POST['submit']) && !empty($_POST['searchbox'])){
    $query = $bd->prepare("select * from products where name = ?");
    $query->execute([$_POST['searchbox']]);
    $result = $query->fetchAll(PDO::FETCH_OBJ);
}
require ('views/searchedProductsViews.php');