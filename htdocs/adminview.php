<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>The Project - Login Info</title>
    <link rel="stylesheet" href="root.css" />
    <link rel="stylesheet" href="loginstyle.css" />
</head>

<body>

    <div class="log-form">
        <form action="<?= $_SERVER["SCRIPT_NAME"] ?>" method="post">
            <h1>COMP3512 - The Project</h1>
            <h2>Login Page</h2>
            <div class="input">
                <input type="text" title="username" name="username" placeholder="enter username" value=<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>>
                <br />
                <input type="password" title="username" name="password" placeholder="enter password" value=<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>>
                <br />
                <button type="submit" class="btn">Login</button>
                <p> <?= $passwordforgot ?> </p>
                <a class="forgot" href="#">Forgot Username?</a>
            </div>
        </form>
    </div>
</body>

</html>