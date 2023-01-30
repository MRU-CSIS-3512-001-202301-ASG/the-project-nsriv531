<!DOCTYPE html>
<?php

require 'admin.php';

?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>The Project - Login Info</title>
    <link rel="stylesheet" href="loginstyle.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>

    <div class="log-form">
        <h2>COMP3512(Web II) - The Project[Login page]</h2>
        <form action="dashboard.php" method="post">

            <div class="input">
                <input type="text" title="username" name="username" placeholder="enter username" />
                <br />
                <br />
                <input type="password" title="username" name="password" placeholder="enter password" />
                <br />
                <br />
                <button type="submit" class="btn">Login</button>
                <br />
                <br />
                <a class="forgot" href="#">Forgot Username?</a>
            </div>


        </form>
    </div>
</body>

</html>