<?php

    namespace App;
    require_once "PDO_DB.php";
    use PDO;
    use App\PDO_DB;

    if(isset($_POST["Email"]) && isset($_POST["Password"]))
    {
        $email = $_POST["Email"];
        $password = $_POST["Password"];
    }
    else
    {
        header("Location: index.php");
    }
    

    $conn = new PDO_DB();
    $conn->CheckUser($email, $password);
?>