<?php

session_start();

if (!isset($_SESSION["loginkey"])) {

    header("Location: admin.php");
} else {

    require 'dashboard.view.php';
}
