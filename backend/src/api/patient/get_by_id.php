<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";
    
    $response = ["result" => true, "name" => null, "address" => null, "tel" => null];

    $id = $_GET["id"];
    if (!$id) {
        $response["result"] = false;
        echo json_encode($response);
        exit;
    }

    $conn = SQLConnection::create();
    $stmt = $conn->prepare("SELECT name, address, tel FROM patients WHERE id = :id;");
    $stmt->bind_int(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch();
    if (!$row) {
        $response["result"] = false;
        echo json_encode($response);
        exit;
    }

    $response["name"] = $row["name"];
    $response["address"] = $row["address"];
    $response["tel"] = $row["tel"];
    echo json_encode($response);
?>