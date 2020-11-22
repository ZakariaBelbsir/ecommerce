<?php
require ('../Database/db.php');
if(isset($_GET['p']) && !empty($_GET['p'])) {
    $getDetails = $bd->prepare("select * from shoppingcart where commandRef=? and complete=1");
    $getDetails->execute([$_GET['p']]);
    $details = $getDetails->fetchAll(PDO::FETCH_OBJ);
}
require('adminViews/commandDetailsView.php');