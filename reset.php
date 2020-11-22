<?php
require ('Database/db.php');
require ('functions/UserFunctions.php');
require ('functions/notifications.php');

// verifying if the user came from right url

if(isset($_GET['p']) && isset($_GET['token'])) {

    // comparing passwords entered and updating user's password

    if (isset($_POST['reset'])) {
        if ($_POST['password'] == $_POST['confirm']) {
            //verifying if entered email belongs to user or admin
                // users
            $selectUser = $bd->prepare('select email from users where email=?');
            $selectUser->execute([$_GET['p']]);
            $userResult = $selectUser->rowCount();
                // admins
            $selectAdmin = $bd->prepare('select email from admins where email=?');
            $selectAdmin->execute([$_GET['p']]);
            $adminResult = $selectAdmin->rowCount();

            if ($userResult > 0) {
                $query = $bd->prepare('update users set password = ? where email=?');
                $query->execute([md5($_POST['password']), $_GET['p']]);
            } else if ($adminResult > 0) {
                $query = $bd->prepare('update admins set password = ? where email=?');
                $query->execute([md5($_POST['password']), $_GET['p']]);
            }
            setNotification("Password updated successfully", 'success');
            header('location: login.php');
        }
    }
}

require ('views/ResetView.php');