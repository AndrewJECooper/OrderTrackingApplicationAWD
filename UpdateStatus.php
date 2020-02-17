<?php
    namespace App;
    require_once "PDO_DB.php";
    use App\PDO_DB;

    //$orderId = $_GET["orderId"];

    $link = new PDO_DB();

    $link->UpdateStatus(1, 1);
    header("Location: OrderCheck.php");
?>