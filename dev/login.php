<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
require_once "templates/header.inc.php";
session_start();

if (isset($_SESSION['messages']['passworderror'])) {
    echo "<p>" . $_SESSION['messages']['passworderror'] . "</p>";
    unset($_SESSION['messages']['passworderror']);
}
?>
    <!-- main start -->
</div>
    <main>
        <br><br><br>
        <div class="logInField">
            <form method="post" action="../dev/src/formhandlers/login.php">
                <h1 class="title">Log in</h1>
                <br><br>
                <label for="email"><strong>Email</strong></label>
                <input type="text" id="username" name="email">
                <label for="password"><strong>Password</strong></label>
                <input type="password" id="password" name="password">
                <br><br><br><br>
                <button type="submit" id="login"><b>Log in</b></button>
                <br>
                <button id="login2">
                    <a href="register.php">I don't have an account</a>
                </button>
            </form>

        </div>
    </main>
    <!-- main eind -->
</body>

</html>