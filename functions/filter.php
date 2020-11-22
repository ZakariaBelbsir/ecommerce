<?php
if(!isset($_SESSION['id']) and !isset($_SESSION['email'])){
    header('location:index.php');
    exit;
}