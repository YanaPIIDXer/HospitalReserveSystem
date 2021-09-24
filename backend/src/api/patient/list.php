<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";

    $conn = SQLCOnnection::create();
    $stmt = $conn->prepare("SELECT id, name, address, tel FROM patients;");     // TODO:後でページネーションを考慮
    $stmt->execute();

    $response = [];
    while ($row = $stmt->fetch()) {
        array_push($response, [
            "id" => $row["id"],
            "name" => $row["name"],
            "address" => $row["address"],
            "tel" => $row["tel"],
        ]);
    }

    echo json_encode($response);
?>