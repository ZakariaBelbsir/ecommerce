<?php
try{
    $bd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
}
catch(Exception $e){
    die("Erreur " . $e.getMessage());
} ?>