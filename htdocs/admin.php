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

            // $passwordforgot = "Username or password is incorrect!";

            // $password = $_POST["password"];
            // $options = [
            //     'cost' => 12,
            // ];

            // $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

            // echo $hashed_password;


            
            require 'adminview.php';

        }
    }
}
