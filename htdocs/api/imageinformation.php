<?php

require '../database/DatabaseHelper.php';

$config = require '../database/config.php';

require '../database/query-helpers.php';

$db_helper = new DatabaseHelper($config);

$imageInfo = image_info($db_helper, $_GET["imageid"]);

if ($imageInfo) {
    $data = array(
        "Image_Information:" => $imageInfo    
    );
    
    $resp = json_encode($data);

} else {

    $resp = json_encode([]);
}

//header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo $resp;
