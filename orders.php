<?php
session_start();
require('includes.php');
$selectCommands = $bd->prepare("select * from command where userId=?");
$selectCommands->execute([$_SESSION['id']]);
$userCommands = $selectCommands->fetchAll(PDO::FETCH_OBJ);
$commandDetails = $bd->prepare("select * from shoppingCart where userId=?");
$commandDetails->execute([$_SESSION['id']]);
$userCommandDetails = $commandDetails->fetchAll(PDO::FETCH_OBJ);
require("views/ordersView.php");