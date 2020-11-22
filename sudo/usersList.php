<?php
require ('../Database/db.php');
$usersList = $bd->query("select * from users");
$usersList = $usersList->fetchAll(PDO::FETCH_OBJ);
require ('adminViews/usersView.php');