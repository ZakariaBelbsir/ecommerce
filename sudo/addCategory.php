<?php
require ('../Database/db.php');
if(isset($_POST['add'])){
    if(!empty($_POST['cat'])){
        $addCategory = $bd->prepare('insert into categories (category) values(?)');
        $addCategory->execute([$_POST['cat']]);
        header('location: categoriesList.php');
    }
}
require ('adminViews/addCategoryView.php');