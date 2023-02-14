<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === "GET") {

    $passwordforgot = "";

    require 'adminview.php';
} else if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST["username"]) && isset($_POST["password"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username == "admin" && $password == "password") {

            $_SESSION["loginkey"] = true;

            header("Location: browsefilter.php");
        } else {

            $passwordforgot = "Invalid username or password";

            require 'adminview.php';
        }
    }
}
