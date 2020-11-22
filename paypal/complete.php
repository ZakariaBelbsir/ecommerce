<?php
session_start();
if(isset($_GET['p']) && !empty($_GET['p'])){
    require('../views/completeView.php');
} else
    header("location: cancel.php");
