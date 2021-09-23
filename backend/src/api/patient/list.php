<?php
    require_once "../../config/allow_cors.php";

    // ※モック
    $response = [
        ["name" => "aaa", "address" => "xxx", "tel" => "0000000000"],
        ["name" => "bbb", "address" => "yyy", "tel" => "0000111000"],
        ["name" => "ccc", "address" => "zzz", "tel" => "0000000111"],
        ["name" => "ddd", "address" => "xyz", "tel" => "0222000000"],
        ["name" => "eee", "address" => "zyx", "tel" => "0000546000"]
    ];
    echo json_encode($response);
?>