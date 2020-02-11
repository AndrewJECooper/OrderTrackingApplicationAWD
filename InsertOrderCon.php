<?php

    namespace App;
    require_once "CreateOrder.php";
    require_once "PDO_DB.php";
    use PDO;
    use App\PDO_DB;
 

    session_start();
    $email = $_SESSION["Email"];

    $address1 = $_POST['Address1'];
    $address2 = $_POST['Address2'];
    $postcode = $_POST['Postcode'];
    $description = $_POST['Description'];
    $dateAdded = date('Y-m-d H:i:s');
    $customerId = 1234;

 
    /* NEED TO CHANGE ALL THESE TO USE THE PDO_DB CLASS (Connector, InsertOrderCon etc...*/
    $dbServer = "mysql:host=localhost;dbname=awd_assignment";
    $dbUser = "root";
    $dbPwd = "";

    $link = new PDO($dbServer, $dbUser, $dbPwd); 


    $link = new PDO_DB();
    $link->WriteToDatabase($address1, $address2, $customerId, $postcode, $description, $email, $dateAdded, $link);
?>