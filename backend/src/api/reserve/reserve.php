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

    $conn = SQLConnection::create();
    $stmt = $conn->prepare("INSERT INTO reserves(patient_id, date_and_time) VALUES(:id, :datetime);");
    $stmt->bind_int(":id", $id);
    $stmt->bind_string(":datetime", $datetime);
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        $response["result"] = false;
    }

    echo json_encode($response);
?>