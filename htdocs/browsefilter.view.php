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

    $queryResult = image_grabber($db_helper, $orderbyfilter);

    echo "<form method='post'>";
    echo "<table>";
    echo "<tr>
    <td><input type='text' id='fname' name='fname' placeholder='image id search'></td>
    <td><input type='text' id='fname' name='fname' placeholder='JPEG Search'></td>
    <td><input type='text' id='fname' name='fname' placeholder='City Name Search'></td>
    <td><input type='text' id='fname' name='fname' placeholder='Country search'></td>
    <td><input type='text' id='fname' name='fname' placeholder='Latitude search'></td>
    <td><input type='text' id='fname' name='fname' placeholder='Longitude search'></td>
    <td><input type='text' id='fname' name='fname' placeholder='Rating search'></td>";
    echo "</tr>";
    echo "<tr>
    <td><button type='submit' class='btn'>Image ID</button></td>
    <td><button type='submit'class='btn'>JPEG</button></td>
    <td><button type='submit'class='btn'>City Name</button></td>
    <td><button type='submit'class='btn'>Country</button></td>
    <td><button type='submit'class='btn'>Latitude</button></td>
    <td><button type='submit'class='btn'>Longitude</button></td>
    <td><button type='submit'class='btn'>Rating</button></td>
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
    echo "<tr><button type='submit' class='btnsearch'>Reset</button></tr>";
    echo "<tr><button type='submit' class='btnsearch'>Search</button></tr>";
    echo "</form>";

    ?>

</body>

</html>