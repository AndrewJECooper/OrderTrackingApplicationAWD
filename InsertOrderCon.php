<?php
    namespace App;
    session_start();
    require_once "PDO_DB.php";
    use App\PDO_DB;

    if(isset($_POST["Address1"]) && isset($_POST["Address2"]) && isset($_POST["Postcode"]) && isset($_POST["Description"]))
    {
        $address1 = $_POST["Address1"];
        $address2 = $_POST["Address2"];
        $postcode = $_POST["Postcode"];
        $description = $_POST["Description"];
        $statusId = 1;
        $dateAdded = date('Y-m-d H:i:s');
    }

    $link = new PDO_DB();

    $customerId = $link->GetUserId($_SESSION["Email"]);

    $link->WriteToDatabase($customerId, $statusId, $dateAdded, $description, $address1, $address2, $postcode);
?>