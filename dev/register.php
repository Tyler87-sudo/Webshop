<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
</body>
<?php

if (isset($_SESSION['messages']['userexist'])) {
    echo "<p>" . $_SESSION['messages']['userexist'] . "</p>";
    unset($_SESSION['messages']['userexist']);
}

session_start();

require_once "../dev/templates/header.inc.php";
require_once "../dev/src/Database/Database.php";


if (isset($_SESSION['messages']['error'])) {
    echo "<p>" . $_SESSION['messages']['error'] . "</p>";
    unset($_SESSION['messages']['error']);
}


?>



    <!-- main start -->
    <main>
        <div class="registerField">
            <h1 class="title">Register</h1>
            <form method="POST" id="registerForm" action="../dev/src/formhandlers/register.php">
                <label for="username"><strong>Username</strong></label>
                <input type="text" id="username" name="username" required>

                <label for="email"><strong>Email</strong></label>
                <input type="email" id="email" name="email" required>

                <label for="address"><strong>Address</strong></label>
                <input type="text" id="address" name="address" required>

                <label for="postcode"><strong>Postcode</strong></label>
                <input type="text" id="postcode" name="postcode" required>

                <label for="birthday"><strong>Birthday</strong></label>
                <input type="date" name="birthday" id="birthday" required>

                <label for="password"><strong>Password</strong></label>
                <input type="password" id="password" name="password" required>

                <label for="passwordConfirm"><strong>Confirm Password</strong></label>
                <input type="password" id="passwordConfirm" name="passwordConfirm" required>
                <br><br><br>
                <button  type="submit" id="registerButton"><b>Register</b></button>
            </form>
        </div>
    </main>
    <!-- main end -->

    <script src="js/script.js"></script>
</body>
</html>
