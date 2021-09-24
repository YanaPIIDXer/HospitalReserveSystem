<?php
    require_once "./classes/SQLConnection.php";
    $conn = SQLConnection::create();
    echo json_encode(["CraetedSQLConnection" => ($conn != null)]);
?>