<?php

require '../database/DatabaseHelper.php';

$config = require '../database/config.php';

require '../database/query-helpers.php';

$db_helper = new DatabaseHelper($config);

$cities = get_cities($db_helper, $_GET["countryISO"]);

if ($cities) {

    $data = array(
        "cities" => $cities
    );

    $resp = json_encode($data);
} else {

    $resp = json_encode([]);
}

//header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo $resp;
