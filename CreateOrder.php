<!DOCTYPE html>
<head>
    <title>Order Tracker | Create Order </title>
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
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="OrderCheck.php">Home</a>
                    <a class="nav-item nav-link active" href="CreateOrder.php">Create Order<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="Contact.php">Contact Us</a>
                    <a class="nav-item nav-link" href="Signout.php">Sign out</a>
                </div>
            </div>
        </nav>
    </header>

    <main id = "main-section">
        <div class = "row text-center m-5"> 
            <div class = "col-sm-12">
                <h1> Welcome to your parcel tracker! </h1>
                <h5> Create new orders here <?echo $_SESSION["Email"]; ?></h5>
                <form action = "InsertOrderCon.php" method = "POST">
                    <div class = "form-group">
                        <label for = "AddressL1"> Address Line 1 </label>
                        <input type = "text" class = "form-control" name="Address1" placeholder = "Address Line 1">
                    </div>
                    <div class = "form-group">
                        <label for = "AddressL2"> Address Line 2 </label>
                        <input type = "text" class = "form-control" name="Address2" placeholder = "Address Line 2">
                    </div>
                    <div class = "form-group">
                        <label for = "Postcode"> Postcode </label>
                        <input type = "text" class = "form-control" name ="Postcode" placeholder = "Postcode">
                    </div>
                    <div class = "form-group">
                        <label for = "Description"> Description </label>
                        <textarea class = "form-control" rows = "3" name ="Description" placeholder = "Add a description of your order"></textarea>
                    </div>
                    <button type = "submit" class = "btn btn-default"> Create Order </button>
                </form>
            </div>      
        </div>
    </main>
<?
}
else 
{
    header("Location: OrderCheck.php");
}
?>
</body>
</html>
