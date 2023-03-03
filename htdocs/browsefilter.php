<?php

session_start();


if (!isset($_SESSION["loginkey"])) {

    header("Location: admin.php");
} else {

    $orderby = "default";
    $orderASCDESC = "default";

    if (!isset($_COOKIE["citycookie"]) && isset($_GET["citybutton"])) {

        $orderby = "City";
        $orderASCDESC = "ASC";

        setcookie("citycookie", "ASC", time() + (86400 * 30), "/");
    } else if (isset($_COOKIE["citycookie"])  && isset($_GET["citybutton"])) {

        $orderby = "City";

        if ($_COOKIE["citycookie"] == "ASC") {
            setcookie("citycookie", "DESC", time() + (86400 * 30), "/");
            $orderASCDESC = "DESC";
            echo $orderASCDESC;
        } else if ($_COOKIE["citycookie"] == "DESC") {
            setcookie("citycookie", "ASC", time() + (86400 * 30), "/");
            $orderASCDESC = "ASC";
        }
    }

    if (!isset($_COOKIE["ratingcookie"]) && isset($_GET["ratingbutton"])) {

        $orderby = "City";
        $orderASCDESC = "ASC";

        setcookie("citycookie", "ASC", time() + (86400 * 30), "/");
    } else if (isset($_COOKIE["citycookie"])  && isset($_GET["citybutton"])) {

        $orderby = "City";

        if ($_COOKIE["citycookie"] == "ASC") {
            setcookie("citycookie", "DESC", time() + (86400 * 30), "/");
            $orderASCDESC = "DESC";
            echo $orderASCDESC;
        } else if ($_COOKIE["citycookie"] == "DESC") {
            setcookie("citycookie", "ASC", time() + (86400 * 30), "/");
            $orderASCDESC = "ASC";
        }
    }




    require 'browsefilter.view.php';
}
