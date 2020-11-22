<?php
session_start();
require('Database/db.php');
require('functions/UserFunctions.php');
require ('functions/notifications.php');
require ('remember.php');
// if the form was sent

if (isset($_POST['register']))
{
    // google reCaptcha v2
    $captcha_secret = "6LdSnZkUAAAAAAO695S0RG-euZDRwir4HujhaGkd";
    $captcha_response = $_POST['g-recaptcha-response'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$captcha_secret&response=$captcha_response&remoteip=$user_ip";
    $response =file_get_contents($url);
    $result = json_decode($response);
    // verify if all fields are filled

    if (not_empty(['name','email','PW','cpw']))
    {

        $errors=[]; // array containing all errors
        extract($_POST);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            $errors[]="Invalid email adress!";
        if(mb_strlen($PW)<6)
            $errors[]="Password is too short!";
        else

            if ($PW!=$cpw)
                $errors[]="The passwords don't match";

        if (is_already_in_use('email',$email,'users'))
            $errors[]="Email is already used";
        if(!$result->success)
            $errors[] = 'Captcha verification failed';

        if (count($errors)==0)
        {
            // sending activation email

            $to=$email;
            $subject='Account Verification';
            $pw = md5($PW);
            $token=md5($name.$email.$pw);
            $_SESSION['token'] = $token;
            ob_start();
            require('views/templates/email.php');
            $content=ob_get_clean();
            $headers="From: iisga.tsdi2019@gmail.com";
            $headers.="MIME-Version:1.0"."\r\n";
            $headers.='Content-type:text/html; charset=UTF-8'."\r\n";
            mail($to, $subject, $content, $headers);

            // letting the user know that verification email was sent
            setNotification("Activation link was sent to your email adress", "success");
            $query = $bd->prepare('INSERT INTO users (name,email, password) VALUES (?,?,?)');
            $query->execute(array(htmlspecialchars($name), htmlspecialchars($email), htmlspecialchars($pw)));
            header('location:index.php');
            exit;
        }

    }

    else

        $errors[]="You have to fill all the fields";

} // end isset

require('views/SignupView.php');
?>