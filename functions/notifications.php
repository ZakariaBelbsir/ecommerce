<?php
if(isset($_SESSION['notification']['message'])){
    ?>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 mt-2">
            <div class="alert alert-<?= $_SESSION['notification']['type']?> alert-dismissible fade show" role="alert">
                <h4 class="text-center"><?= $_SESSION['notification']['message'] ?></h4>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php
    $_SESSION['notification'] = [];
}
?>