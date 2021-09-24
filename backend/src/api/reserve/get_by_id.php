<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";
    
    $response = ["result" => true, "datetime" => null];

    $id = $_GET["id"];
    if (!$id) {
        $response["result"] = false;
        echo json_encode($response);
        exit;
    }

    $conn = SQLConnection::create();
    $stmt = $conn->prepare("SELECT date_and_time FROM reserves WHERE id = :id;");
    $stmt->bind_int(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch();
    if (!$row) {
        $response["result"] = false;
        echo json_encode($response);
        exit;
    }

    $response["datetime"] = $row["date_and_time"];
    echo json_encode($response);
?>