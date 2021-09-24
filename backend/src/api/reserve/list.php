<?php
    require_once "../../config/allow_cors.php";
    require_once "../../classes/SQLConnection.php";
    
    date_default_timezone_set('Asia/Tokyo');
    
    $conn = SQLCOnnection::create();
    $stmt = $conn->prepare("SELECT patients.name, reserves.date_and_time FROM patients INNER JOIN reserves ON patients.id = reserves.patient_id WHERE reserves.date_and_time >= :now ORDER BY reserves.date_and_time ASC;");
    $stmt->bind_string(":now", date("Y/m/d H:i:s"));
    $stmt->execute();

    $response = [];
    while ($row = $stmt->fetch()) {
        array_push($response, [
            "name" => $row["name"],
            "date_and_time" => $row["date_and_time"]
        ]);
    }

    echo json_encode($response);
?>