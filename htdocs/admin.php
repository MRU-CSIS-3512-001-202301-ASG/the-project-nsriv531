<?php

require 'database/DatabaseHelper.php';
$config = require 'database/config.php';
$db_helper = new DatabaseHelper($config);

require 'database/query-helpers.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] === "GET") {

    $passwordforgot = "";

    require 'adminview.php';
} else if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST["username"]) && isset($_POST["password"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $accountResults = user_authentication($db_helper);

        if ($username == $accountResults['username'] && password_verify($password, $accountResults['password'])) {

            $_SESSION["loginkey"] = true;

            header("Location: browsefilter.php");
        } else {


            require 'adminview.php';

            $passwordforgot = "Username or password is incorrect!";
        }
    }
}
