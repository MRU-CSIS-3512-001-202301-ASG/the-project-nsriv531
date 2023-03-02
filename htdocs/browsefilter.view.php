<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Browse Filter Page - Dashboard</title>
    <link rel="stylesheet" href="browsefilterstyle.css" />
    <!-- Font Awesome Cdn Link -->
</head>

<body>

    <?php


    require 'database/DatabaseHelper.php';

    $config = require 'database/config.php';

    $db_helper = new DatabaseHelper($config);

    require 'database/query-helpers.php';

    $queryResult = image_grabber($db_helper);

    foreach ($queryResult as $value) {

        echo "<table><tr><td>"
            . $value["ImageID"] . " </td>" .
            "<td>" . $value["Path"] . "</td>" .
            "<td>" . $value["AsciiName"] . "</td>" .
            "<td>" . $value["CountryName"] . "</td>" .
            "<td>" . $value["Latitude"] . "</td>" .
            "<td>" . $value["Longitude"] . "</td>" .
            "<td>" . $value["rating"] . "</td>" .
            "</td></tr></table>";
    }

    ?>

</body>

</html>