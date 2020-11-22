<?php
$title = "Dashboard";
require ('includes/header.php');
ob_start();
?>
<body>
<div class="container">
    <div class="row justify-content-center">
    <div class="card products col-3 mx-1 my-3 bg-info">
<!--        <img style="" src="" class=" card-img-top">-->
        <div class="card-body bg-light">
            <h5 class="card-text ">
                Total Products: <?=$products['COUNT(productId)'] ?>
                <br>
                <i class="display-1 fas fa-barcode"></i>
                <a href="productsList.php">More <i class="fas fa-angle-double-right"></i></a>
            </h5>
        </div>
    </div>
    <div class="card products col-3 mx-1 my-3 bg-info">
<!--        <img style="" src="" class=" card-img-top">-->
        <div class="card-body bg-light">
            <h5 class="card-text">
                Total Sales: <?=$sales['SUM(sales)'] ?>
                <i class="fas fa-shopping-cart display-1"></i>
                <a href="productsList.php">More <i class="fas fa-angle-double-right"></i></a>
            </h5>
        </div>
    </div>
    <div class="card products col-3 mx-1 my-3 bg-info">
<!--        <img style="" src="" class=" card-img-top">-->
        <div class="card-body bg-light">
            <h5 class="card-text ">Total Users: <?= $users['COUNT(userId)'] ?>
                <i class="fas fa-users display-1"></i>
                <a href="usersList.php">More <i class="fas fa-angle-double-right"></i>
                </a>
            </h5>
        </div>
    </div>
    </div>
    <h3 class="text-center text-info">Choose a year to view total sales</h3>
    <div class="row justify-content-end">
    <form action="" method="post" class="form-inline">
        <div class="form-group">
        <label for="year">Year: </label>
        <select name="year" id="year">
            <?php
            for($i=2019;$i<2050;$i++) {
                ?>
                <option value="<?=$i?>"><?=$i?></option>
                <?php
            }
            ?>
        </select>
        </div>
        <div class="form-group">
            <button class="btn btn-outline-primary" name="select" type="submit">Select</button>
        </div>
    </form>
    </div>
    <canvas id="myChart" width="400" height="250"></canvas>
<?php
    $main = ob_get_clean();
    require ('includes/nav.php');
?>
    </div>

<script src="public/js/jquery.js"></script>
<script src="public/js/popper.js"></script>
<script src="public/js/bootstrap.js"></script>
<script src="public/js/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'Mai', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: '# of Sales',
                data: [<?=$totalSales[0]['COUNT(*)'] ?>,
                    <?=$totalSales[1]['COUNT(*)'] ?>,
                    <?=$totalSales[2]['COUNT(*)'] ?>,
                    <?=$totalSales[3]['COUNT(*)'] ?>,
                    <?=$totalSales[4]['COUNT(*)'] ?>,
                    <?=$totalSales[5]['COUNT(*)'] ?>,
                    <?=$totalSales[6]['COUNT(*)'] ?>,
                    <?=$totalSales[7]['COUNT(*)'] ?>,
                    <?=$totalSales[8]['COUNT(*)'] ?>,
                    <?=$totalSales[9]['COUNT(*)'] ?>,
                    <?=$totalSales[10]['COUNT(*)'] ?>,
                    <?=$totalSales[11]['COUNT(*)'] ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</body>
</html>