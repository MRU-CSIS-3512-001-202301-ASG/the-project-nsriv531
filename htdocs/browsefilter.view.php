<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Browse Filter Page - Dashboard</title>
    <link rel="stylesheet" href="browserfilterstyle.css" />
    <!-- Font Awesome Cdn Link -->
</head>

<body>
    <button type="submit">Logout</button>

    <?php

    require 'database/DatabaseHelper.php';

    $config = require 'database/config.php';

    $db_helper = new DatabaseHelper($config);

    require 'database/query-helpers.php';

    $queryResult = image_grabber($db_helper);

    echo "<table>";
    echo "<tr>
    <td>Image ID</td>
    <td>JPEG</td>
    <td>City Name</td>
    <td>Country</td>
    <td>Latitude</td>
    <td>Longitude</td>
    <td>Rating</td>
    </tr>";

    foreach ($queryResult as $value) {

        echo "<tr><td>" . $value["ImageID"] . " </td>" .
            "<td><img src=" . image_helper($value["Path"]) . "></img></td>" .
            "<td>" . $value["AsciiName"] . "</td>" .
            "<td>" . $value["CountryName"] . "</td>" .
            "<td>" . $value["Latitude"] . "</td>" .
            "<td>" . $value["Longitude"] . "</td>" .
            "<td>" . $value["rating"] . "</td></tr>";
    }
    echo "</table>";


    ?>

</body>

</html>