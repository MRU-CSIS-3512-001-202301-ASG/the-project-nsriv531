<?php

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

if ($username == "admin" && $password == "password") {
    header("Location: dashboard.php");
} else {
    echo "Invalid username or password";
}
