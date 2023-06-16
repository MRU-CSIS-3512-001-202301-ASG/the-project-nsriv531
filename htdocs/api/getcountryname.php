<?php

require '../database/DatabaseHelper.php';

$config = require '../database/config.php';

require '../database/query-helpers.php';

$db_helper = new DatabaseHelper($config);

$countryname = get_country_names($db_helper, $_GET['countryISO']);

if ($countryname) {

    $data = array(
        "Country_Name" => $countryname
    );

    $resp = json_encode($data);
} else {

    $resp = json_encode([]);
}

//header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo $resp;
