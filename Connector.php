<?php

    namespace App;
    require_once "PDO_DB.php";
    use PDO;
    use App\Login;
    use App\PDO_DB;

<<<<<<< HEAD
=======
    $dbServer = "mysql:host=localhost;dbname=awd_assignment";
    $dbUser = "root";
    $dbPwd = "";

    $link = new PDO($dbServer, $dbUser, $dbPwd); 
    //$link = new PDO_DB();

>>>>>>> f477c61a3e05efd14bddf15f0707b6c1bb8fcdcd
    if(isset($_POST["Email"]) && isset($_POST["Password"]))
    {
        $email = $_POST["Email"];
        $password = $_POST["Password"];
    }
    else
    {
        header("Location: index.php");
    }

    $link = new PDO_DB();
    $link->CheckUser($email, $password);
?>