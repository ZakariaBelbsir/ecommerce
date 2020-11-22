<?php
    session_start();
    require ('Database/db.php');
    require ('remember.php');
    $query = $bd->query("select * from products where quantity>0 order by sales desc limit 6");
    $prod = $query->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST['search'])) {

        extract($_POST);
        $response = $bd->query("select name from products where name like '%$q%'");
        $search = $response->fetchAll(PDO::FETCH_ASSOC);
//        print_r($search);
//        echo $search->name;
        if (count($search)>0) {
            echo "<ul id='searched'>";
            foreach ($search as $productName) {
                echo "<li>" . $productName['name'] . "</li>";
            }
            echo "</ul>";
        }  else
            echo "<h5> No match for what you entered! </h5> ";
            exit();
    }
    if(isset($_POST['submit']) && !empty($_POST['searchbox'])){
        print_r($_POST);
    //    $select = $bd->prepare("select * from products where name like ?");
     //   $select->execute([$_POST['searchbox']]);
//        header("location: searchedProducts.php?name=" . $_POST['searchbox']);
//        exit();
    }
    require ('views/indexView.php');
?>