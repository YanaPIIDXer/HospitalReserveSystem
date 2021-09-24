<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";

    $result = ["result" => true];

    $name = $_POST["name"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];

    if ($name == "" || $address == "" || $tel == "" || !preg_match("/^[0-9]{9,10}$/", $tel)){
        $result["result"] = false;
        echo json_encode($result);
        exit;
    }

    try {
        $conn = SQLConnection::create();
        $stmt = $conn->prepare("INSERT INTO patients(name, address, tel) VALUES(:name, :address, :tel);");
        $stmt->bind_string(":name", $name);
        $stmt->bind_string(":address", $address);
        $stmt->bind_string(":tel", $tel);
        $stmt->execute();
    } catch (PDOException $e) {
        $result["result"] = false;
    }

    echo json_encode($result);
?>