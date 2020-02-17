<?php

    namespace App;
    require_once "PDO_DB.php";
    use App\PDO_DB;

    $link = new PDO_DB();

    if(isset($_POST["Email"]) && isset($_POST["Password"]))
    {
        $email = $_POST["Email"];
        $password = $_POST["Password"];

        session_start();
        $_SESSION["Email"] = $email;
        $link->CheckUser($email, $password);
    }    
?>