<?php
require ('../Database/db.php');
$commandsList = $bd->query("select * from command");
$commandsList = $commandsList->fetchAll(PDO::FETCH_OBJ);
require ('adminViews/salesView.php');