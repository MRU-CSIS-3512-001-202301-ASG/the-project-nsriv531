<?php


require '../database/DatabaseHelper.php';

$config = require '../database/config.php';


require '../database/query-helpers.php';


$db_helper = new DatabaseHelper($config);

$ddrop = ddropfinder($db_helper);

if ($ddrop) {

    $total_count = count($ddrop);
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

echo ($resp);
