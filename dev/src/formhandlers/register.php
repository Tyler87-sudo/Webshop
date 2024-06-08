<?php
require_once "../../src/Database/Database.php";

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

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql =
    "INSERT INTO customers (username, email, address, postcode, birthday, password) 
    VALUES (:username, :email, :address, :postcode, :birthday, :hashedPassword)"
;

$placeholders = [
    ':username' => $username,
    ':email' => $email,
    ':birthday' => $birthday,
    ':address' => $address,
    ':postcode' => $postcode,
    ':password' => $hashedPassword,
];

Database::query($sql, $placeholders);

header('Location: ../../index.php');
exit();
?>