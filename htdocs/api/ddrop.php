<?php


require 'database/DatabaseHelper.php';

$config = require 'database/config.php';

$db_helper = new DatabaseHelper($config);

$ddrop = ddropfinder($db_helper, $_GET['city']);

if ($ddrop){

    $total_count = count($ddropfinder);
    $data = array(
        "total_count" => $total_count,
        "drops" => $ddrop


    );

    $resp = json_encode($data);
} else {

    $resp = json_encode([]);
}

//header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

//var_dump($resp);

echo ($resp);
