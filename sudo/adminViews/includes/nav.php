<div class="row">
<div class="col-sm-2">
<h4 class="text-danger text-right">Myshop</h4>
<ul class="nav flex-column align-content-end">
    <li class="nav-item py-2 border-bottom">
        <a class="nav-link text-dark btn btn-outline-danger" href="dashboard.php">Dashboard</a>
    </li>
    <li class="nav-item py-2 border-bottom">
        <a class="nav-link text-dark btn btn-outline-danger" href="usersList.php">Users</a>
    </li>
    <li class="nav-item py-2 border-bottom">
        <a class="nav-link text-dark btn btn-outline-danger" href="salesList.php">Sales</a>
    </li>
    <li class="nav-item py-2 border-bottom">
<!--        <a class="nav-link text-dark btn btn-outline-danger" href="productsList.php"></a>-->
        <div class="btn-group">
        <button type="button" class="btn btn-outline-danger dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item bg-success" href="productsList.php">Products list</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item bg-success" href="categoriesList.php">Categories</a>
        </div>
</div>
    </li>
        <li class="nav-item py-2 border-bottom">
            <a class="nav-link text-dark btn btn-outline-danger" href="logout.php">Logout</a>
        </li>
</ul>
</div>
    <div class="col-sm-8 ">
    <?= $main; ?>
    </div>
</div>