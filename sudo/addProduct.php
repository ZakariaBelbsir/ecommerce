<?php
require ('../Database/db.php');
//require('../functions/UserFunctions.php');
// Selecting all categories for dropdown in form

$query = $bd->query('select * from categories');
$product_categories = $query->fetchAll(PDO::FETCH_OBJ);

// setting $path to null to avoid problems if user doesn't insert product picture
$path = '';

if(isset($_POST['add'])){

    extract($_POST);
    $captcha_secret = "6LdSnZkUAAAAAAO695S0RG-euZDRwir4HujhaGkd";
    $captcha_response = $_POST['g-recaptcha-response'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$captcha_secret&response=$captcha_response&remoteip=$user_ip";
    $response =file_get_contents($url);
    $result = json_decode($response);
    // Verifying all fields are filled

    if(!empty($prod) && !empty($desc) && !empty($price) && !empty($category) && !empty($quantity) && $result->success){

        // checking if product image is inserted

        if (isset($_FILES['pic']) && $_FILES['pic']['error']==0){
            if($_FILES['img']['size']<=2000000){
                $fileinfo =pathinfo($_FILES['img']['name']);
                $uploaded_extention =$fileinfo['extension'];
                $allowed_extensions = array('png', 'jpg', 'jpeg');
                $path = '../photos/'.$_FILES['img']['name'];
                if(in_array($uploaded_extention, $allowed_extensions)){
                    move_uploaded_file($_FILES['pic']['tmp_name'], $path);
                }
            }
        }
//
        $dbPath = 'photos/'.$_FILES['pic']['name'];
//             inserting product into database

        $add = $bd->prepare('insert into products (name, price, category, description, quantity, pictures, sales) values(?, ?, ?, ?, ?, ?,0)');
        $add->execute([$prod, $price, $category, $desc, $quantity, $dbPath]);

//        setNotification('Product added successfully', 'success');
        header('location:productsList.php');
    }
    else {

//        setNotification('Please fill all fields and try again, and agree to terms of use', 'danger');
    }

}

require('adminViews/SellingView.php');