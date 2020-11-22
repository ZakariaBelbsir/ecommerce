<?php
session_start();
require ('includes.php');


$user = find_user($_SESSION['id']);
if(!$user)
    header("location: profile.php?p=".$_SESSION['id']);
else{
    $name_db = htmlspecialchars($user->name);
    $phone_db = htmlspecialchars($user->phone);
    $city_db = htmlspecialchars($user->city);
    $country_db = htmlspecialchars($user->country);
    $adress_db = htmlspecialchars($user->adress);
    $zip_db = htmlspecialchars($user->zip);
}

//updating users table

if(isset($_POST['save'])){
    extract($_POST);
    $query = $bd->prepare("update users set name=?, phone=?, city=?, adress=?, country=?, zip=? where email=?");
    $query->execute([$name, $phone, $city, $adress, $country, $zip, $_SESSION['email']]);
    setNotification('Your account was updated successfully', "success");
    header('location: account.php?');
}

require ('views/AccountView.php');