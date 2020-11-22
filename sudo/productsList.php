<?php
require ('../Database/db.php');
$productsList = $bd->query("select * from products");
$productsList = $productsList->fetchAll(PDO::FETCH_OBJ);

require ('adminViews/productsView.php');