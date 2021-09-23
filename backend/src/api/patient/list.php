<?php
    require_once "../../config/allow_cors.php";

    // ※モック
    $response = [
        ["id" => 1, "name" => "aaa", "address" => "xxx", "tel" => "0000000000"],
        ["id" => 2, "name" => "bbb", "address" => "yyy", "tel" => "0000111000"],
        ["id" => 3, "name" => "ccc", "address" => "zzz", "tel" => "0000000111"],
        ["id" => 4, "name" => "ddd", "address" => "xyz", "tel" => "0222000000"],
        ["id" => 5, "name" => "eee", "address" => "zyx", "tel" => "0000546000"]
    ];
    echo json_encode($response);
?>