<?php
$title = "Sales";
require ('includes/header.php');
ob_start();
?>
<body>
<div class="container">
    <table class=" table table-striped my-3 text-center">
        <thead>
        <tr>
            <th>Sale's Reference</th>
            <th>User ID</th>
            <th>Sale's Date</th>
            <th>Actions</th>
        </tr>
        <tbody>
        <?php
        foreach ($commandsList as $command) {
            ?>
            <tr>
                <td><?=$command->commandRef?></td>
                <td><?=$command->userId?></td>
                <td><?=$command->commandDate?></td>
                <td>
                    <a href="details.php?p=<?=$command->commandRef ?>"><i class="fas fa-info"></i></i></a>
                </td>
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
