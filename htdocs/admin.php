<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] === "GET") {

    $passwordforgot = "";

    require 'adminview.php';

} else if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST["username"]) && isset($_POST["password"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
         echo $hashed_password;

        if ($username == "admin" && $password == "password") {

            $_SESSION["loginkey"] = true;

            header("Location: browsefilter.php");
        } else {

            $passwordforgot = "Invalid username or password";

            $variable = password_hash("password", PASSWORD_BCRYPT);

            echo $variable;

            $otherVariable = password_verify("password", $variable);


            if ($otherVariable == true) {
                echo "true";
            }

            require 'adminview.php';
        }
    }
}
