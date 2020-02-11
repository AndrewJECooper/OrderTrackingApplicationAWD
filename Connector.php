<?php

    namespace App;
    require_once "PDO_DB.php";
    require_once "Login.php";
    use PDO;
    use App\Login;
    use App\PDO_DB;

    $dbServer = "mysql:host=localhost;dbname=awd_assignment";
    $dbUser = "root";
    $dbPwd = "";

    $link = new PDO($dbServer, $dbUser, $dbPwd); 

    if(isset($_POST["Email"]) && isset($_POST["Password"]))
    {
        $email = $_POST["Email"];
        $password = $_POST["Password"];
    }
    else
    {
        header("Location: index.php");
    }
    

    $conn = new Login();
    $conn->CheckLogin($email, $password, $link);
?>