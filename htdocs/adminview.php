<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>The Project - Login Info</title>
    <link rel="stylesheet" href="loginstyle.css" />
    <script src="https://cdn.tailwindcss.com"></script> <!--magic needed for TailwindCSS to work -->
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>

    <div class="log-form">
        <h2>COMP3512(Web II) - The Project[Login page]</h2>
        <form action="<?= $_SERVER["SCRIPT_NAME"] ?>" method="post">

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

            <div class='text-2xl text-center shadow-xl border border-gray-40 font-light p-8 rounded text-gray-500 bg-white mt-6'> <?= $passwordforgot ?></div>

        </form>
    </div>
</body>

</html>