<?php

    namespace App;
    require_once "PDO_DB.php";
    use App\PDO_DB;

    if(isset($_POST["Email"]) && isset($_POST["Password"]))
    {
        $email = $_POST["Email"];
        $password = $_POST["Password"];

        $link = new PDO_DB();
        $link->CheckUser($email, $password);
    }    
?>