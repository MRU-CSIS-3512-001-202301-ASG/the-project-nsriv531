<?php

session_start();


if (!isset($_SESSION["loginkey"])) {

    header("Location: admin.php");
} else {

    $orderby = "default";
    $orderASCDESC = "default";
    $andWHERE = "default";
    $andCondition = "default";

    if (!isset($_COOKIE["citycookie"]) && isset($_GET["citybutton"])) {
        unset($_COOKIE['ratingcookie']);
        $orderby = "City";
        $orderASCDESC = "ASC";
        setcookie("citycookie", "ASC", time() + (86400 * 30), "/");
    } else if (isset($_COOKIE["citycookie"])  && isset($_GET["citybutton"])) {

        $orderby = "City";

        if ($_COOKIE["citycookie"] == "ASC") {
            setcookie("citycookie", "DESC", time() + (86400 * 30), "/");
            $orderASCDESC = "DESC";
        } else if ($_COOKIE["citycookie"] == "DESC") {

            setcookie("citycookie", "ASC", time() + (86400 * 30), "/");
            $orderASCDESC = "ASC";
        }
    }

    if (!isset($_COOKIE["ratingcookie"]) && isset($_GET["ratingbutton"])) {
        unset($_COOKIE['citycookie']);

        $orderby = "Rating";
        $orderASCDESC = "ASC";
        setcookie("ratingcookie", "ASC", time() + (86400 * 30), "/");
    } else if (isset($_COOKIE["ratingcookie"])  && isset($_GET["ratingbutton"])) {

        $orderby = "Rating";

        if ($_COOKIE["ratingcookie"] == "ASC") {

            setcookie("ratingcookie", "DESC", time() + (86400 * 30), "/");
            $orderASCDESC = "DESC";
        } else if ($_COOKIE["ratingcookie"] == "DESC") {

            setcookie("ratingcookie", "ASC", time() + (86400 * 30), "/");
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

    for ($i = 1; $i <= 148; $i++) {
        $paramname = 'rateselector' . $i;
        echo "triggered";
        if (isset($_GET[$paramname]) && isset($_GET["searchbutton"])) {
            $changeInRating = $_GET[$paramname];
            $imageID = $i;
            echo "selector has been set";
        }
    }

    require 'browsefilter.view.php';
}
