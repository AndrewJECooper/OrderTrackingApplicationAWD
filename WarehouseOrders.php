<?php
    namespace App;
    session_start();
    require_once "PDO_DB.php";
    use App\PDO_DB;

    $link = new PDO_DB();
    $statusId = $_GET['statusId'];
    $orders = $link->FilterOrders($statusId);

?>
<!DOCTYPE html>
<head>
    <title>Order Tracker | Current Orders </title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0, shrink-to-fit=no">
     <!--Styles -->
     <link rel="Stylesheet" href="css/bootstrap.min.css">

     <!-- Scripts -->
    <script src="Scripts/jquery-3.0.0.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
</head>
<body>
<header id="main-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="OrderCheck.php">Order Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav ml-auto">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <a class="nav-item nav-link" href="OrderCheck.php">Home </a>
                <a class="nav-item nav-link" href="CreateOrder.php">Create Order</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Filter</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="WarehouseOrders.php?statusId=1">In Warehouse</a>
                        <a class="dropdown-item" href="WarehouseOrders.php?statusId=2">In Transit</a>
                        <a class="dropdown-item" href="WarehouseOrders.php?statusId=3">Delivered</a>
                    <div class="dropdown-divider"></div>
                    </div>
                </li>
                <a class="nav-item nav-link" href="Contact.php">Contact Us</a>
                <form class="form-inline" action="QueryLink.php" method = "POST">
                    <input class="form-control mr-sm-2" type="search" name = "search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>  
                </form>
                <a class="nav-item nav-link" href="Signout.php">Sign out</a>
            </div>
            </div>
        </div>
    </nav>
</header>
<?if(empty($orders))
{?>
    <h3 class = "text-center mt-5"> There are no orders that fit that filter </h3>
<?}
else{?>
<div class = "main-section">
    <h3 class = "text-center mt-5"> Here is a list of your filtered items </h3>
        <div class = "container">
            <div class = "row mt-5">
            <? foreach($orders as $order){?>
                <div class = "col-sm-12 col-md-4">
                    <div class = "card m-3">              
                        <div class = "card-body">
                            <h3 class = "card-title text-center"><?php echo $order['Id'];?></h5>
                            <h5 class = "card-subtitle text-center text-muted"><?php echo $order['Description'];?></h5>
                            <p class = "text-center"><?php echo $order['ItemDescription'];?></p>
                            <p class = "text-center text-muted"><?php echo $order['DateAdded'];?></p>
                            <a href = "CancelOrder.php" class = "btn btn-default"> Cancel Order </button></a>
                            <a href = "FullDetails.php" class = "btn btn-default"> View Details </button></a>
                        </div>
                    </div>
                </div>
            <?} ?>
        </div>
    </div>  
</div>
<?} ?>

</body>
</html>