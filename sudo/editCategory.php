<?php
require ('../Database/db.php');
if(isset($_GET['p'])) {
    $getCategory = $bd->prepare("select * from categories where categoryId=?");
    $getCategory->execute([$_GET['p']]);
    $category = $getCategory->fetch(PDO::FETCH_OBJ);
}
if(isset($_POST['update'])){
    if(!empty($_POST['cat'])){
        $updateCategory = $bd->prepare('update categories set category=? where categoryId=?');
        $updateCategory->execute([$_POST['cat'], $category->categoryId]);
        $updateProducts = $bd->prepare("update products set category=? where category=?");
        $updateProducts->execute([$_POST['cat'], $category->category]);
        header('location: categoriesList.php');
    }
}
require ('adminViews/editCategoryView.php');