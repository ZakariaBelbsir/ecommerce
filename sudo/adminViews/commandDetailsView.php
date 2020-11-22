<?php
$title = "Command Details";
require ('includes/header.php');
ob_start();
?>
<body>
<div class="container">
    <div class="row justify-content-end">
        <a href="salesList.php"><button class="my-3 btn btn-danger"><i class="fas fa-backward"></i> Go Back</button></a>
    </div>
    <table class=" table table-striped my-3 text-center">
        <thead>
        <tr>
            <th>User ID</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <tbody>
        <?php
        $price=0;
        foreach ($details as $detail) {
            ?>
            <tr>
                <td><?=$detail->userId?></td>
                <td><?=$detail->productId?></td>
                <td><?=$detail->quantity?></td>
                <td><?=$detail->price?></td>
            </tr>

            <?php
            $price+=$detail->price;
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td>Total Price: </td>
            <td class="text-center "><?=$price ?></td>
        </tr>
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
