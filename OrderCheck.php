<!DOCTYPE html>
<head>
    <title>Order Tracker | Current Orders </title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0, shrink-to-fit=no">
     <!--Styles -->
     <link rel="Stylesheet" href="css/bootstrap.min.css">

     <!-- Scripts -->
</head>
<?php
    session_start();
    if(@$_SESSION["Email"])
    {
?>
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
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>  
                </form>
                <a class="nav-item nav-link" href="signout.php">Sign out</a>
            </div>
            </div>
        </div>
    </nav>
</header>

    <h1 class = "text-center m-5"> Welcome <?php echo $_SESSION["Email"]; ?> </h1>
    <h3 class = "text-center"> Here is a list of your orders </h3>

    <?php
    $dbServer = "mysql:host=localhost; dbname=awd_assignment";
    $dbUser = "root";
    $dbPwd = "";

    $link = new PDO($dbServer, $dbUser, $dbPwd);
    $stmt = $link->prepare("SELECT o.Id, o.ItemDescription, os.Description FROM orders o INNER JOIN orderstatus os ON o.StatusId = os.Id INNER JOIN users u ON o.CustomerId = u.Id WHERE u.Email = '{$_SESSION['Email']}' ORDER BY o.StatusId ASC");
    $stmt->execute();
    $orders = $stmt->fetchAll();
?>

    <div class = "container" id= "UserItems">
        <div class = "row mt-5">
    <?
    foreach($orders as $order)
    { ?>    
            <div class = "col-3">
                <div class = "card m-3">              
                    <div class = "card-body">
                        <h3 class = "card-title text-center"><?php echo $order['Id'];?></h5>
                        <h5 class = "card-subtitle text-center text-muted"><?php echo $order['Description'];?></h5>
                        <p class = "text-center"><?php echo $order['ItemDescription'];?></p>
                        <a href = "CancelOrder.php" class = "btn btn-default"> Cancel Order </button></a>
                    </div>
                </div>
            </div>
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
