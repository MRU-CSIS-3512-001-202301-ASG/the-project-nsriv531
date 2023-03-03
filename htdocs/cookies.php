
<?php

$orderby = "default";
$orderASCDESC = "default";

if (isset($_GET["citybutton"])) {
    if ($orderby != "City") {
        echo "executed";
        $orderby = "City";
        $orderASCDESC = "ASC";
        setcookie("citycookie", "ASC", time() + (86400 * 30), "/");
    } else if (isset($_COOKIE["citycookie"])) {

        if ($_COOKIE["citycookie"] == "ASC") {
            setcookie("citycookie", "DESC", time() + (86400 * 30), "/");
            $orderASCDESC = "DESC";
        } else if ($_COOKIE["citycookie"] == "DESC") {
            setcookie("citycookie", "ASC", time() + (86400 * 30), "/");
            $orderASCDESC = "ASC";
        }
    }
}
