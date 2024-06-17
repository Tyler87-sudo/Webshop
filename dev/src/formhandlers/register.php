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

if (empty($username) || empty($email) || empty($address) || empty($postcode) || empty($birthday) || empty($password) || empty($passwordConfirm)) {
    die("All fields are required.");
}

if ($password !== $passwordConfirm) {
    die("Passwords do not match.");
}

$sql =
    "INSERT INTO customers (username, email, address, postcode, birthday, password) 
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

header('Location: ../../index.php');
exit();
?>