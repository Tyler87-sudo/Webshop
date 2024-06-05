<?php

require_once '../dev/src/formhandlers/register.php';

$sql = 'SELECT * FROM users';

Database::query($sql);
$product = Database::get();

$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$birthday = $_POST['birthday'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

if (empty($username) || empty($email) || empty($address) || empty($postcode) || empty($birthday) || empty($password) || empty($passwordConfirm)) {
    die("All fields are required.");
}

if ($password !== $passwordConfirm) {
    die("Passwords do not match.");
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, address, postcode, birthday, password) VALUES ('$username', '$email', '$address', '$postcode', '$birthday', '$hashedPassword')";

?>


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
require_once "dev/templates/header.inc.php"
?>

    <!-- main start -->
    <main>
        <div class="registerField">
            <h1 class="title">Register</h1>
            <form id="registerForm">
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
                <button type="button" onclick="register()" id="registerButton"><b>Register</b></button>
            </form>
        </div>
    </main>
    <!-- main end -->

    <script src="js/script.js"></script>
</body>
</html>
