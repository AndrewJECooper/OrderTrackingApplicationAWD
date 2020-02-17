<?php

    namespace App;
    require_once "PDO_DB.php";
    use App\PDO_DB;

    $link = new PDO_DB();

    if(isset($_POST["search"]))
    {
        $searchItem = $_POST["search"];
    }

    $link->QueryDatabase($searchItem);

?>