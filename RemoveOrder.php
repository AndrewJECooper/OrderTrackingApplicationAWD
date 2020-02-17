<?php
    namespace App;
    require_once "PDO_DB.php";
    use App\PDO_DB;

    $link = new PDO_DB();

    $id = $_GET["orderId"];

    $link->RemoveFromDatabase($id);
    header("Location: OrderCheck.php");
?>