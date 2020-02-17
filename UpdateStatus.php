<?php
    namespace App;
    require_once "PDO_DB.php";
    use App\PDO_DB;

    $link = new PDO_DB();

    $orderId = $_GET["orderId"];
    $statusId = $_GET["statusId"];

    $link->UpdateStatus($orderId, $statusId);
    header("Location: OrderCheck.php");
?>