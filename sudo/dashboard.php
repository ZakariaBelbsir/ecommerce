<?php
require ('../Database/db.php');
$totalSales = [];
$getSales = $bd->query("select SUM(sales) from products ");
$sales = $getSales->fetch();

$getProducts = $bd->query("select COUNT(productId) from products ");
$products = $getProducts->fetch();

$getUsers = $bd->query("select COUNT(userId) from users ");
$users = $getUsers->fetch();
if(isset($_POST['select'])) {
    for ($i = 1; $i <= 12; $i++) {
        $salesTotal = $bd->prepare("select COUNT(*) from command where MONTH(commandDate)=? and YEAR(commandDate)=?");
        $salesTotal->execute([$i, $_POST['year']]);
        $salesTotal = $salesTotal->fetch();
        array_push($totalSales, $salesTotal);
    }
}
require ('adminViews/dashboardView.php');