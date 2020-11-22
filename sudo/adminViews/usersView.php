<?php
$title = "Users";
require ('includes/header.php');
ob_start();
?>
<body>
<div class="container">
    <table class=" table table-striped my-3 text-center">
        <thead>
        <tr>
            <th>User ID</th>
            <th>User Email</th>
            <th>Active</th>
        </tr>
        <tbody>
        <?php
        foreach ($usersList as $user) {
            ?>
            <tr>
                <td><?=$user->userId?></td>
                <td><?=$user->email?></td>
                <td><?=$user->active ?></td>
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
