<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="browserfilterstyle.css" />
    <!-- Font Awesome Cdn Link -->
</head>

<body>
    <title>Browse Filter Page - Dashboard</title>

    <?php
    echo "<form method='get'>";
    echo "<button type='submit' class = 'logout' name='logoutbutton'>Logout</button>";
    echo "<table>
    <tr>
    <td> <input type='radio' id='cityradiobutton' name='cityradiobutton' value=''><label for='contactChoice1'>City</label></td>
    <td> <input type='radio' id='countryradiobutton' name='countryradiobutton' value=''><label for='contactChoice1'>Country</label></td>
    <td> <input type='radio' id='ratingradiobutton' name='ratingradiobutton' value=''><label for='contactChoice1'>Rating</label></td>
    </tr>
    <tr>
    <td colspan='2'><input type='text' name='searchtext'></td>";
    echo "<td><button type='submit' class='btnsearch' name='searchbutton'>Search</button></td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
    echo "<form method='get'>";
    echo "<tr>
    <td>
    <button type='submit' class='changerating' name='submitbutton'>Change Rating</button>
    </td>
    </tr>";
    echo "<table>";
    echo "<tr> 
    <td>ImageID</td> 
    <td>ImagePath</td> 
    <td>City</td>
    <td>Country</td> 
    <td>Latitude</td> 
    <td>Longitude</td> 
    <td>Rating</td>";
    echo "</tr>";
    echo "<tr>
    <td></td>
    <td></td>
    <td><button type='submit' class='ascdesc' name='citybutton'>ASC/DESC</button></td>
    <td></td>
    <td></td>
    <td></td>
    <td><button type='submit' class='ascdesc' name='ratingbutton'>ASC/DESC</button></td>";
    echo "</tr>";
    foreach ($queryResult as $value) {
        echo "<tr><td>" . $value["ImageID"] . " </td>" .
            "<td><img src=" . image_helper($value["Path"]) . "></img></td>" .
            "<td>" . $value["AsciiName"] . "</td>" .
            "<td>" . $value["CountryName"] . "</td>" .
            "<td>" . $value["Latitude"] . "</td>" .
            "<td>" . $value["Longitude"] . "</td>" .
            "<td>" . $value["rating"] . "<input type='number' name='rateselector" . $value["ImageID"] . "' min='1' max='5'></td></tr>";
    }
    echo "</table>";
    echo "</form>";
    echo $emptyQuery;


    ?>

</body>

</html>