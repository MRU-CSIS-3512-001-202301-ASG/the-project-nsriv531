<?php


require '../database/DatabaseHelper.php';

$config = require '../database/config.php';

require '../database/query-helpers.php';

$db_helper = new DatabaseHelper($config);

$imagerating1 = imageratingFinder1($db_helper, $_GET['imageid']);
$imagerating2 = imageratingFinder2($db_helper, $_GET['imageid']);
$imagerating3 = imageratingFinder3($db_helper, $_GET['imageid']);
$imagerating4 = imageratingFinder4($db_helper, $_GET['imageid']);
$imagerating5 = imageratingFinder5($db_helper, $_GET['imageid']);

if ($imagerating3) {

    $total_count_1 = count($imagerating1);
    $total_count_2 = count($imagerating2);
    $total_count_3 = count($imagerating3);
    $total_count_4 = count($imagerating4);
    $total_count_5 = count($imagerating5);
    
    $data = array(
        "total_count1" => $total_count_1,
        "total_count2" => $total_count_2,
        "total_count3" => $total_count_3,
        "total_count4" => $total_count_4,
        "total_count5" => $total_count_5
    );

    $resp = json_encode($data);

}  else {

    $resp = json_encode([]);
}

//header("HTTP/1.1 200 OK");
header("Content-Type: application/json");

echo $resp;