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
session_start();

require_once "../dev/templates/header.inc.php";
require_once "../dev/src/helpers/Auth.php";


if (isset($_SESSION['messages']['passworderror'])) {
    echo "<p>" . $_SESSION['messages']['passworderror'] . "</p>";
    unset($_SESSION['messages']['passworderror']);
}


if (array_key_exists('button1', $_POST)) {
    button1();
}
function button1()
{
    session_unset();
    session_destroy();
}

if (isset($_SESSION['messages']['registered']) && $_SESSION['messages']['registered'] === true) {
    echo "<p>" . "You have been succesfully registered, you can now login" . "</p>";
    unset($_SESSION['messages']['registered']);
};

?>
    <!-- main start -->

<?php if (!isset($_SESSION['messages']['loggedin'])): ?>
</div>
    <main>
        <br><br><br>
        <div class="logInField">
            <form method="post" action="../dev/src/formhandlers/login.php">
                <h1 class="title">Log in</h1>
                <br><br>
                <label for="email"><strong>Email</strong></label>
                <input type="text" id="username" name="email" required>
                <label for="password"><strong>Password</strong></label>
                <input type="password" id="password" name="password" required>
                <br><br><br><br>
                <button type="submit" id="login"><b>Log in</b></button>
                <br>
            </form>
            <button id="login2">
                <a href="register.php">I don't have an account</a>
            </button>

        </div>
    </main>
    <!-- main eind -->
</body>

<?php else: ?>

    <div class="loggedIn">
        <h1>You are already logged in!</h1>
    </div>
    <form method="post">
        <input type="submit" name="button1"
               class="confirm-button" value="Logout" />
    </form>

<?php endif ?>

</html>