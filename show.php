<?php
session_start();
require ('includes.php');
require ('remember.php');
if(isset($_GET['prod'])) {
    $query = $bd->prepare('select * from products where productId = ?');
    $query->execute([$_GET['prod']]);
    $result = $query->fetch(PDO::FETCH_OBJ);
}
require('views/ShowProductView.php');