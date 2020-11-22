<?php
require ('../Database/db.php');
$query = $bd->query('select * from categories');
$product_categories = $query->fetchAll(PDO::FETCH_OBJ);
if (isset($_GET['p'])) {
    $action = 'Edit Product';
    $act = 'Update product';
    $q = $bd->prepare('select * from products where productId = ?');
    $q->execute([$_GET['p']]);
    $p = $q->fetch(PDO::FETCH_OBJ);
}
$path = $p->pictures;
if (isset($_POST['update'])) {
    extract($_POST);

    // Verifying all fields are filled

    if (!empty($prod) && !empty($desc) && !empty($price) && !empty($category) && !empty($quantity)) {

        // checking if product image is inserted

        if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
            if ($_FILES['img']['size'] <= 2000000) {
                $fileinfo = pathinfo($_FILES['img']['name']);
                $uploaded_extention = $fileinfo['extension'];
                $allowed_extensions = array('png', 'jpg', 'jpeg');
                $path = '../photos/' . $_FILES['img']['name'];
                if (in_array($uploaded_extention, $allowed_extensions)) {
                    move_uploaded_file($_FILES['img']['tmp_name'], $path);
                }
            }
        }
        $dbPath = 'photos/' . $_FILES['img']['name'];
        // updating products table

        $update = $bd->prepare('update products set name=?, price=?, category=?, description=?, quantity=?, pictures=? where productId=?');
        $update->execute([htmlspecialchars($prod),
            htmlspecialchars($price),
            htmlspecialchars($category),
            htmlspecialchars($desc),
            htmlspecialchars($quantity),
            htmlspecialchars($dbPath),
            htmlspecialchars($_GET['p'])]);

        header('location:productsList.php');
    }
}


require ('adminViews/EditView.php');