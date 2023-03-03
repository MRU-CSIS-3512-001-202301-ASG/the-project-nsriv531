<?php

session_start();

require 'cookies.php';


if (!isset($_SESSION["loginkey"])) {

    header("Location: admin.php");
} else {
    require 'browsefilter.view.php';
}
