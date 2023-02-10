<?php

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "password") {

        $_SESSION["loginkey"] = true;

        header("Location: dashboard.php");
    } else {
        echo "Invalid username or password";
    }
}
