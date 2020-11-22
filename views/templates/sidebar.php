<?php
require ('Database/db.php');
$query = $bd->query('select * from categories');
$category = $query->fetchAll(PDO::FETCH_OBJ);
//$category = $result->category;

?>
<div class="row">
    <!-- Side navbar -->
    <div class="col-sm-2">
    <ul class="nav flex-column text-left bg-secondary">
        <?php
        foreach($category as $cat) {

            ?>
            <li class="nav-item btn-outline-primary">
                <a href="products.php?category=<?= $cat->category?>&page=1" class="nav-link text-white"><?=$cat->category?></a>
            </li>
            <?php
        }
        ?>
    </ul>
    </div>
    <div class="col-sm-8">
        <?php
        echo $side;
        ?>
    </div>
</div>
