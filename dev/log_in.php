<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php require_once "templates/header.inc.php";?>
    <!-- main start -->
    <main>
        <br><br><br>
        <div class="logInField">
            <h1 class="title">Log in</h1>
            <br><br>
            <p><i><strong>Username</strong></i></p>
            <input type="text" id="username">
            <p><i><strong>Password</strong></i></p>
            <input type="password" id="password">
            <br><br><br><br><br><br>
            <button onclick="logIn()" id="login"><b>Log in</b></button>
            <br>
            <a href="register.php">I don't have an account</a>
        </div>
    </main>
    <!-- main eind -->
</body>

</html>