<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";

    $id = $_GET["id"];
    if (!$id) {
        echo json_encode(["result" => false]);
        exit;
    }

    $conn = SQLConnection::create();
    $stmt = $conn->prepare("SELECT name FROM patients WHERE id = :id;");
    $stmt->bind_int(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch();
    $name = $row["name"];

    $stmt = $conn->prepare("SELECT id, date_and_time FROM reserves WHERE patient_id = :id");
    $stmt->bind_int(":id", $id);
    $stmt->execute();
    $reserves = [];
    while ($row = $stmt->fetch()) {
        $reserve = [
            "id" => $row["id"],
            "date_and_time" => $row["date_and_time"]
        ];
        array_push($reserves, $reserve);
    }

    $response = [
        "name" => $name,
        "reserves" => $reserves
    ];

    echo json_encode($response);
?>