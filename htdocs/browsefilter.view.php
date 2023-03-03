<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="browserfilterstyle.css" />
    <!-- Font Awesome Cdn Link -->
</head>

<body>
    <title>Browse Filter Page - Dashboard</title>
    <button type="submit">Logout</button>

    <?php


    require 'database/DatabaseHelper.php';

    $config = require 'database/config.php';

    $db_helper = new DatabaseHelper($config);

    require 'database/query-helpers.php';


    $queryResult = image_grabber($db_helper, $orderby, $orderASCDESC);


    echo "<form method='get'>";
    echo "<table>";
    echo "<tr>
    <td>ImageID</td>
    <td>ImagePath</td>
    <td><input type='text' id='citynamesearch' name='city' placeholder='City Name Search'></td>
    <td><input type='text' id='countrynamesearch' name='country' placeholder='Country search'></td>
    <td>Latitude</td>
    <td>Longitude</td>
    <td><input type='text' id='ratingesearch' name='rating' placeholder='Rating search'></td>";
    echo "</tr>";
    echo "<tr>
    <td></td>
    <td></td>
    <td><button type='submit' class='btnsearch' name='citybutton'>ASC/DESC</button></td>
    <td></td>
    <td></td>
    <td></td>
    <td><button type='submit' class='btnsearch' name='ratingbutton'>ASC/DESC</button></td>";
    echo "</tr>";
    foreach ($queryResult as $value) {

        echo "<tr><td>" . $value["ImageID"] . " </td>" .
            "<td><img src=" . image_helper($value["Path"]) . "></img></td>" .
            "<td>" . $value["AsciiName"] . "</td>" .
            "<td>" . $value["CountryName"] . "</td>" .
            "<td>" . $value["Latitude"] . "</td>" .
            "<td>" . $value["Longitude"] . "</td>" .
            "<td>" . $value["rating"] . "<input type='number' id='rateselector" . $value["ImageID"] . "' min='1' max='5'></input></td></tr>";
    }
    echo "</table>";
    echo "<tr><button type='submit' class='btnsearch'>Reset</button></tr>";
    echo "<tr><button type='submit' class='btnsearch'>Search</button></tr>";
    echo "</form>";



    ?>

</body>

</html>