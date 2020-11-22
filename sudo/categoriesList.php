<?php
require ('../Database/db.php');
$categoriesList = $bd->query("select * from categories");
$categoriesList = $categoriesList->fetchAll(PDO::FETCH_OBJ);
require ('adminViews/categoriesView.php');