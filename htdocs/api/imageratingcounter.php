<?php


require '../database/DatabaseHelper.php';

$config = require '../database/config.php';

require '../database/query-helpers.php';

$db_helper = new DatabaseHelper($config);

$imagerating = imageratingFinder($db_helper, $_GET['imageid']);

if ($imagerating) {

    $total_count = count($imagerating);
    
    $data = array(
        "total_count" => $total_count
    );

    $resp = json_encode($data);

}  else {

    $resp = json_encode([]);
}

//header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo $resp;