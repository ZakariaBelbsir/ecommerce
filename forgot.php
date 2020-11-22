<?php
session_start();
require ('functions/UserFunctions.php');
require ('Database/db.php');
require ('functions/notifications.php');
if(isset($_POST['reset'])){

    //verify if the inserted email exists

    if(is_already_in_use('email',$_POST['email'], 'users' ) == 1){
        $msg = 'An email was sent to your adress';
        setNotification($msg, 'success');

        // send reset password email

        $to=$_POST['email'];
        $subject='Reset Your Password';
        $token = openssl_random_pseudo_bytes(9);
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $_POST['email'];
        ob_start();
        require('views/templates/resetemail.php');
        $content=ob_get_clean();
        $headers="From: iisga.tsdi2019@gmail.com";
        $headers.="MIME-Version:1.0"."\r\n";
        $headers.='Content-type:text/html; charset=UTF-8'."\r\n";
        mail($to, $subject, $content, $headers);
    }
    else{
        $msg = 'Email not found';
        setNotification($msg, 'danger');
    }
}
require('views/ForgotView.php');