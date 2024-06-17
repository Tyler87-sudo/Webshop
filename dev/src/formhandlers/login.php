<?php
session_start();

require_once "../../src/Database/Database.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
header('Location: ../../login.php');
exit();
}

if (!guest) {
    
}

$password = htmlentities($_POST['password']);
$email = htmlentities($_POST['email']);

//
//if (empty($email) || empty($password)) {
//die("All Fields are required");
//}

$sql = "SELECT * FROM customers WHERE email = :email";
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
header('Location: ../../index.php');
exit();

?>