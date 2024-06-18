<?php
session_start();

require_once "../../src/Database/Database.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
header('Location: ../../login.php');
exit();
}


if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = [];
}

$_SESSION['messages']['loggedin'] = false;


if (isset($_SESSION['messages']['loggedin']) && $_SESSION['messages']['loggedin'] == true) {
    echo "<h1>" . "You are already logged in, " . $_SESSION['messages']['user'] . "</h1>";
    header('Location: ../../index.php');
    exit();
} else {
    echo "<h1>" . "Please login!" . "</h1>";

}

$password = htmlentities($_POST['password']);
$email = htmlentities($_POST['email']);


$sql = "SELECT * FROM users WHERE email = :email";
$placeholders = array(':email' => $email);

Database::query($sql, $placeholders);

$user = Database::get();

if (empty($user)) {
$_SESSION['messages']['error'] = "Email does not exist. Please register!";
header('Location: ../../register.php');
exit();
}


$customerpassword = $user['password'];

if (!password_verify("$password", $customerpassword)) {
$_SESSION['messages']['passworderror'] = "Invalid password!";
header('Location: ../../login.php');
exit();
}


$_SESSION['user'] = $user;
unset($_SESSION['user']['password']);

$_SESSION['messages']['login_success'] = "You have successfully logged in.";
$_SESSION['messages']['user'] = $user['username'];
$_SESSION['messages']['loggedin'] = true;

header('Location: ../../index.php');
exit();
?>