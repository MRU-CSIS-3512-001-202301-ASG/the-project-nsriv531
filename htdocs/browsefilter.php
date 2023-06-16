<?php

session_start();

require 'database/DatabaseHelper.php';
$config = require 'database/config.php';
$db_helper = new DatabaseHelper($config);

require 'database/query-helpers.php';

if (!isset($_SESSION["loginkey"])) {

    header("Location: admin.php");
} else {

    $orderby = "default";
    $changeInRating = "";
    $imageID = "";
    $orderASCDESC = "default";
    $andWHERE = "default";
    $andCondition = "default";
    $emptyQuery = "";

    if (isset($_GET["logoutbutton"])) {
        unset($_SESSION["loginkey"]);
        header('Location: admin.php');
    }

    if (!isset($_COOKIE["citycookie"]) && isset($_GET["citybutton"])) {
        unset($_COOKIE['ratingcookie']);
        $orderby = "City";
        $orderASCDESC = "ASC";
        setcookie("citycookie", "ASC", time() + (86400), "/");
    } else if (isset($_COOKIE["citycookie"])  && isset($_GET["citybutton"])) {

        $orderby = "City";

        if ($_COOKIE["citycookie"] == "ASC") {
            setcookie("citycookie", "DESC", time() + (86400 ), "/");
            $orderASCDESC = "DESC";
        } else if ($_COOKIE["citycookie"] == "DESC") {

            setcookie("citycookie", "ASC", time() + (86400), "/");
            $orderASCDESC = "ASC";
        }
    }

    if (!isset($_COOKIE["ratingcookie"]) && isset($_GET["ratingbutton"])) {
        unset($_COOKIE['citycookie']);

        $orderby = "Rating";
        $orderASCDESC = "ASC";
        setcookie("ratingcookie", "ASC", time() + (86400), "/");
    } else if (isset($_COOKIE["ratingcookie"])  && isset($_GET["ratingbutton"])) {

        $orderby = "Rating";

        if ($_COOKIE["ratingcookie"] == "ASC") {

            setcookie("ratingcookie", "DESC", time() + (86400), "/");

            $orderASCDESC = "DESC";
        } else if ($_COOKIE["ratingcookie"] == "DESC") {

            setcookie("ratingcookie", "ASC", time() + (86400), "/");
            $orderASCDESC = "ASC";
        }
    }

    if (isset($_GET["cityradiobutton"]) && isset($_GET["searchbutton"])) {

        $andWHERE = "City";
        $andCondition = $_GET['searchtext'];
    }

    if (isset($_GET["countryradiobutton"]) && isset($_GET["searchbutton"])) {

        $andWHERE = "Country";
        $andCondition = $_GET['searchtext'];
    }

    if (isset($_GET["ratingradiobutton"]) && isset($_GET["searchbutton"])) {

        $andWHERE = "Rating";
        $andCondition = $_GET['searchtext'];
    }

    for ($i = 1; $i <= sizeof($queryResult = image_grabber($db_helper, $orderby, $orderASCDESC, $andWHERE, $andCondition)); $i++) {
        $paramname = 'rateselector' . $i;
        if (!empty($_GET[$paramname]) && isset($_GET["submitbutton"])) {

            $changeInRating = $_GET[$paramname];
            $imageID = $i;
        }
    }

    if (!empty($changeInRating) && !empty($imageID)) {
        if (is_numeric($changeInRating) && $changeInRating >= 1 && $changeInRating <= 5) { //checks to see if the value is between 1 and 5.
            rating_Change($db_helper, $changeInRating, $imageID);
        } else {
            echo "Value is not between 1 and 5.";
        }
    }

    $queryResult = image_grabber($db_helper, $orderby, $orderASCDESC, $andWHERE, $andCondition);

    if (empty($queryResult)) {
        $emptyQuery = "Filter produced no results.";
    }

    require 'browsefilter.view.php';
}
