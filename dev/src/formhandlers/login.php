<?php
session_start();

require_once "../../src/Database/Database.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
header('Location: ../../login.php');
exit();
}

if (guest())

$_SESSION['messages']['loggedin'] = false;

if ($_SESSION['messages']['loggedin']) {
    echo "<h1>" . "You are already logged in, " . $_SESSION['messages']['user'] . "</h1>";
}

$password = htmlentities($_POST['password']);
$email = htmlentities($_POST['email']);


$sql = "SELECT * FROM users WHERE email = :email";
$placeholders = array(':email' => $email);

Database::query($sql, $placeholders);

$customer = Database::get();

echo $customer['username'];

if (empty($customer)) {
$_SESSION['messages']['error'] = "Email does not exist. Please register!";
header('Location: ../../register.php');
exit();
}

$customerpassword = $customer['password'];

if (!password_verify("$password", $customerpassword)) {
$_SESSION['messages']['passworderror'] = "Invalid password!";
header('Location: ../../login.php');
exit();
}

$_SESSION['customer'] = $customer;
unset($_SESSION['customer']['password']);

$_SESSION['messages']['login_success'] = "You have successfully logged in.";
$_SESSION['messages']['user'] = $customer['username'];
$_SESSION['messages']['loggedin'] = true;
header('Location: ../../index.php');
exit();

?>