<?php
require ('../Database/db.php');
if(isset($_GET['p'])){
    $deleteCategory = $bd->prepare("delete from categories where categoryId=?");
    $deleteCategory->execute([$_GET['p']]);
    header('location: categoriesList.php');
}