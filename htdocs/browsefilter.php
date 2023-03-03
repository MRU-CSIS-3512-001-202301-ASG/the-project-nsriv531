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







    require 'browsefilter.view.php';
}
