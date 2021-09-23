<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";

    $response = ["result" => true];

    $id = $_POST["id"];
    $datetime = $_POST["datetime"];
    if (!$id || !$datetime) {
        $response["result"] = false;
        echo json_encode($response);
        exit;
    }

    echo json_encode($response);
?>