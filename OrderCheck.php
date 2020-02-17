<?php
    session_start();
    require_once "PDO_DB.php";
    use App\PDO_DB;
    if(@$_SESSION["Email"])
    {
?>
<?php
    $link = new PDO_DB();
    $orders = $link->GetOrders($_SESSION["Email"]);
    $admin = $link->GetUserId($_SESSION["Email"]);
?>
<!DOCTYPE html>
<head>
    <title>Order Tracker | Current Orders </title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0, shrink-to-fit=no">
     <!--Styles -->
     <link rel="Stylesheet" href="css/bootstrap.min.css">

     <!-- Scripts -->
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
                <a class="nav-item nav-link active" href="OrderCheck.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="CreateOrder.php">Create Order</a>
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

    <h1 class = "text-center m-5"> Welcome <?php echo $_SESSION["Email"]; ?> </h1>
    

    <?if($admin == 1)
		{?>
    <h3 class = "text-center"> Here is a list of incomplete orders </h3>
    <div class = "container">
        <div class = "row mt-5">
            <?$adminOrders = $link->GetAOrders($admin);
            if(empty($adminOrders))
            {?>
                <h4 class = "text-center"> All orders have been delivered </h4>
           <? }
            else{
			foreach($adminOrders as $order){?>
            <div class = "col-sm-12 col-md-4">
                <div class = "card m-3">              
                    <div class = "card-body">
                        <h3 class = "card-title text-center" name="orderId"><?php echo $order['Id'];?></h5>
                        <h5 class = "card-subtitle text-center text-muted"><?php echo $order['Description'];?></h5>
                        <p class = "text-center"><?php echo $order['FirstName'];?></p>
                        <p class = "text-center"><?php echo $order['Surname'];?></p>
                        <p class = "text-center"><?php echo $order['Email'];?></p>
                        <p class = "text-center"><?php echo $order['ItemDescription'];?></p>
                        <p class = "text-center text-muted"><?php echo $order['DateAdded'];?></p>
                        <a href = "UpdateStatus.php?orderId=<?php echo $order['Id'];?>&statusId=<?php echo $order['StatusId'];?>" class ="btn btn-default"> Update Status </button></a>
                        <a href = "RemoveOrder.php?orderId=<?php echo $order['Id'];?>" class = "btn btn-default"> Remove Order </button></a>
                    </div>
                </div>
            </div>
            <?}
            }
		}
		elseif(empty($orders)){ ?>
            <h4 class = "text-center"> You have no orders to show </h4>
        <?}
        else {?>
        <h3 class = "text-center"> Here is a list of your orders </h3>
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
        <?
    }
    ?>
        </div>
    </div>   

<? }
else
{
    header("Location: index.php");
} ?>
</body>
</html>
