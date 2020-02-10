<!DOCTYPE html>
<head>
    <title>Order Tracker | Log in </title>
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0, shrink-to-fit=no">

    <!--Styles -->
    <link rel="Stylesheet" href="css/bootstrap.min.css">
    <!--<link rel="Stylesheet" href="css/style.css"> -->

    <!-- Scripts -->
    
</head>
<body>
    <main id = "main-section">
        <div class = "row m-5">
            <div class = "col-sm-12">
                <h1> Welcome to your parcel tracker! </h1>
                <h5> Log in to find out details of your orders </h5>
                <form action = "Connector.php" method = "POST">
                    <div class = "form-group">
                        <label for = "Email"> Email </label>
                        <input type = "text" class = "form-control" name="Email" placeholder = "Email Address">
                    </div>
                    <div class = "form-group">
                        <label for = "Password"> Password </label>
                        <input type = "password" class = "form-control" name="Password" placeholder = "Password">
                    </div>
                    <button type = "submit" class = "btn btn-default"> Log in </button>
                </form>
            </div>      
        </div>
    </main>
</body>
</html>

