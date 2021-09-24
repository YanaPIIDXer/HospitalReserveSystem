<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";

    $result = ["result" => true];

    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];

    if (!$id || $name == "" || $address == "" || $tel == "" || !preg_match("/^[0-9]{9,10}$/", $tel)){
        $result["result"] = false;
        echo json_encode($result);
        exit;
    }

    try {
        $conn = SQLConnection::create();
        $stmt = $conn->prepare("UPDATE patients SET name = :name, address = :address, tel = :tel WHERE id = :id;");
        $stmt->bind_string(":name", $name);
        $stmt->bind_string(":address", $address);
        $stmt->bind_string(":tel", $tel);
        $stmt->bind_int(":id", $id)
        $stmt->execute();
    } catch (PDOException $e) {
        $result["result"] = false;
    }

    echo json_encode($result);
?>