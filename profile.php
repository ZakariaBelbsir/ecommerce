<?php
session_start();
require ('includes.php');
require ('remember.php');

// in case the user removes/changes email from url he should be redirected to his profile anyway
if(empty($_GET['p'])){
    header('location: profile.php?p='.$_SESSION['email']);
}
$query = $bd->query("select * from products where quantity>0 order by sales desc limit 6");
$prod = $query->fetchAll(PDO::FETCH_ASSOC);

require ('views/ProfileView.php');