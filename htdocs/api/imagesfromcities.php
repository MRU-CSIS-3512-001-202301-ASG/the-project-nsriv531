<?php

require '../database/DatabaseHelper.php';

$config = require '../database/config.php';

require '../database/query-helpers.php';

$db_helper = new DatabaseHelper($config);

$imageCity = image_from_cities($db_helper, $_GET['cityName']);

if ($imageCity) {

    $data = array(
        "imagepath" => $imageCity
    );

    $resp = json_encode($data);
} else {

    $resp = json_encode([]);
}

//header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo $resp;
