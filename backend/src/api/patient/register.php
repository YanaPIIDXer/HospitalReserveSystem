<?php
    $result = ["result" => true];

    $name = $_POST["name"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];

    if ($name == "" || $address == "" || $tel == "" || !preg_match("/^[0-9]{9,10}$/", $tel)) { $result["result"] = false; }

    // TODO:DB追加処理
    echo json_encode($result);
?>