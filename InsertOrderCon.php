<?php

    namespace App;
    require_once "CreateOrder.php";
    require_once "PDO_DB.php";
    use PDO;
    use App\PDO_DB;
 
    session_start();

    $dbServer = "mysql:host=localhost;dbname=awd_assignment";
    $dbUser = "root";
    $dbPwd = "";

    $link = new PDO($dbServer, $dbUser, $dbPwd); 

    if(isset($_POST["Address1"]) && isset($_POST["Address2"]) && isset($_POST["Postcode"]) && isset($_POST["Description"]))
    {
        $address1 = $_POST["Address1"];
        $address2 = $_POST["Address2"];
        $postcode = $_POST["Postcode"];
        $description = $_POST["Description"];
    }
    else
    {
        echo "All fields are required";
    }

    $dateAdded = date('Y-m-d H:i:s');

    $stmt = $link->prepare("SELECT Id FROM users WHERE Email = '{$_SESSION['Email']}'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    $customerId = $result[0]['Id'];

    $statusId = 1;

    $con = new PDO_DB();
    $con->WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode, $link);

    header("Location: OrderCheck.php");
?>