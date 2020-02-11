<!DOCTYPE html>
<head>
    <title> Order Tracker | Contact </title>
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
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="OrderCheck.php">Home</a>
                    <a class="nav-item nav-link" href="CreateOrder.php">Create Order</a>
                    <a class="nav-item nav-link active" href="Contact.php">Contact Us<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="signout.php">Sign out</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Contact Us</h1>
                    <p class="text-center">Please enter any questions below in the text box to send us an email</p>

                    <form action="mailto:1704746@student.uwtsd.ac.uk" method="POST">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Name..." />
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email..." />
                        </div>
                        <div class="form-group">
                            <label for="comments" class="control-label">Comments</label>
                            <textarea type="text" class="form-control" rows="5" id="comments" placeholder="Your Comments..."></textarea>
                        </div>
                        <div class="col-xs-12">
                            <div class="row text-center">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
            
</body>
</html>