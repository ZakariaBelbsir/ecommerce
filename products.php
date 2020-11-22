<?php
session_start();
require ('Database/db.php');
require ('functions/UserFunctions.php');
require ('functions/notifications.php');
require ('remember.php');
//number of products to display per page
$product_per_page = 9;
// query to get total number of products
$q = $bd->prepare('select productId from products where category = ?');
$q->execute([urldecode($_GET['category'])]);
$rows = $q->rowCount();

//total pages
$total_pages = ceil($rows / $product_per_page);
//verifying page param and getting current page
if(isset($_GET['page']) && !empty($_GET['page'])){
    $_GET['page'] = intval($_GET['page']);
    $current_page = $_GET['page'];
} else{
    $current_page = 1;
}


//count of products from where query will start selecting
$start = ($current_page -1) * $product_per_page;
$query = $bd->prepare('select * from products where category = ? limit '. $start .','. $product_per_page);
//$query = $bd->prepare('select * from products where category = ? limit 0, 9');

$query->execute([$_GET['category']]);
$result = $query->fetchAll(PDO::FETCH_OBJ);

//if(($_GET['page']<=0 || $_GET['page']>$total_pages) && count($result)<=0){
//        echo count($result);
//        header('location: products.php?category=' . $_GET['category'] . '&page=1');
//        exit();
//}
require ('views/ProductsView.php');