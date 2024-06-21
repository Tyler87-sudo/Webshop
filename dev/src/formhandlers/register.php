<?php
require_once "../../src/Database/Database.php";

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../register.php');
    exit();
}

$username = $_POST['username'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

$sql = "SELECT * FROM users WHERE email = :email";
$placeholders = array(':email' => $email);

Database::query($sql, $placeholders);

$user = Database::get();

if ($user['username'] === $username) {
    $_SESSION['messages']['userexist'] = "User already exists";
    header('Location: ../../register.php');
    exit();
}



if ($password !== $passwordConfirm) {
    die("Passwords do not match.");
}

$sql =
    "INSERT INTO users (username, email, address, postcode, birthday, password) 
    VALUES (:username, :email, :address, :postcode, :birthday, :password)"
;

$placeholders = [
    ':username' => $username,
    ':email' => $email,
    ':birthday' => $birthday,
    ':address' => $address,
    ':postcode' => $postcode,
    ':password' => password_hash($password, PASSWORD_DEFAULT),
];

Database::query($sql, $placeholders);

$_SESSION['messages']['registered'] = true;

header('Location: ../../login.php');
exit();
?>