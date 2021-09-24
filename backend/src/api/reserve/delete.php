<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";
    
    $response = ["result" => true];

    $id = $_POST["id"];
    if (!$id) {
        $response["result"] = false;
        echo json_encode($response);
        exit;
    }

    $conn = SQLConnection::create();
    $stmt = $conn->prepare("DELETE FROM reserves WHERE id = :id;");
    $stmt->bind_int(":id", $id);
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $response["result"] = false;
    }
    
    echo json_encode($response);
?>