<?php
$title = "Products";
require ('includes/header.php');
ob_start();
?>
<body>
    <div class="container">
        <div class="row justify-content-end">
        <a href="addProduct.php"><button class="my-3 btn btn-success">New</button></a>
        </div>
        <table class=" table table-striped my-3 text-center">
            <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Picture</th>
                <th>Action</th>
            </tr>
            <tbody>
            <?php
            foreach ($productsList as $product) {
                ?>
                <tr>
                    <td><?=$product->productId?></td>
                    <td><?=$product->name?></td>
                    <td><?=$product->price?></td>
                    <td><?=$product->quantity?></td>
                    <td><?=$product->category?></td>
                    <td><img src="../<?=$product->pictures?>" height="150px" width="150px" alt=""></td>
                    <td><a href="editProduct.php?p=<?= $product->productId?>" class="text-danger">
                            <button class="btn btn-info">Edit</button>
                        </a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            </thead>
        </table>

    <?php
    $main = ob_get_clean();
    require ('includes/nav.php');
    ?>
    </div>
</body>


<?php
require ('includes/footer.php');
?>
