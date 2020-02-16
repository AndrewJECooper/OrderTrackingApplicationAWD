<?php

    /*namespace App;
    require_once "PDO_DB.php";
    //use PDO;
    use App\PDO_DB;*/
 
    session_start();
    $_SESSION["Email"];

    if(isset($_POST["Address1"]) && isset($_POST["Address2"]) && isset($_POST["Postcode"]) && isset($_POST["Description"]))
    {
        $address1 = $_POST["Address1"];
        $address2 = $_POST["Address2"];
        $postcode = $_POST["Postcode"];
        $description = $_POST["Description"];
        $statusId = 1;

    }
    else
    {
        
    }

    $dateAdded = date('Y-m-d H:i:s');

    $dbServer = "mysql:host=localhost; dbname=awd_assignment";
    $dbUser = "root";
    $dbPwd = "";
 
    $link = new PDO($dbServer, $dbUser, $dbPwd);

    $stmt = $link->prepare("SELECT Id FROM users WHERE Email = '{$_SESSION['Email']}'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $customerId = $result[0]['Id'];

    /*echo $customerId;
    echo $statusId;
    echo $dateAdded;
    echo $description;
    echo $address1;
    echo $address2;
    echo $postcode; */
 
    $stmt = "INSERT INTO orders(CustomerId, StatusId, DateAdded, ItemDescription, AddressLine1, AddressLine2, Postcode) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $link->prepare($stmt);
    $stmt->execute([$customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode]);

    /*$con = new PDO_DB();
    $con->WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode, $link);
*/
    header("Location: OrderCheck.php");

?>