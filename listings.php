<?php
session_start();
require ('includes.php');
require ('remember.php');

$query = $bd->query('select * from products');
$prods = $query->fetchAll(PDO::FETCH_OBJ);
if(count($prods)==0){
    setNotification("You don't have any products for sale at the moment", 'secondary');
}
require('views/ListingsView.php');