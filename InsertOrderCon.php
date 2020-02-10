<?php
    require_once "CreateOrder.php";
    require_once "PDO_DB.php";
    use App\PDO_DB;
    use App\PDO;

    //session_start();
    $email = $_SESSION["Email"];

    $address1 = $_POST['Address1'];
    $address2 = $_POST['Address2'];
    $postcode = $_POST['Postcode'];
    $description = $_POST['Description'];
    $customerId = 1234;

 
    /* NEED TO CHANGE ALL THESE TO USE THE PDO_DB CLASS (Connector, InsertOrderCon etc...*/
    $dbServer = "mysql:host=localhost;dbname=awd_assignment";
    $dbUser = "root";
    $dbPwd = "";

    $link = new PDO($dbServer, $dbUser, $dbPwd); 


    $link = new PDO_DB();
    $link->WriteToDatabase($address1, $address2, $customerId, $postcode, $description, $email);
?>