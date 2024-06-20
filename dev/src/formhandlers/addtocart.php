<?php
session_start();

require_once '../Database/Database.php';
require_once '../helpers/Auth.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../index.php');
    exit();
}

if (!isset($_POST['product_id']) || !isset($_POST['quantity'])) {
    header('Location: ../../index.php');
    exit();
}

$product_id = intval($_POST['product_id']);
$quantity = intval($_POST['quantity']);
$customer_id = user_id();

if ($customer_id === 0) {
    header('Location: ../../login.php');
    $_SESSION['messages']['loggedin'] = false;
    exit();
}

$sql = 'SELECT id FROM cart WHERE customer_id = :customer_id AND ordered = 0';
$placeholders = [':customer_id' => $customer_id];

Database::query($sql, $placeholders);
$cart = Database::get();

if (empty($cart)) {
    // If no cart exists, create one
    $sql = 'INSERT INTO cart (customer_id, ordered) VALUES (:customer_id, 0)';
    Database::query($sql, [':customer_id' => $customer_id]);
    $cart_id = Database::getLastInsertId();
} else {
    $cart_id = $cart['id'];
}

$sql = 'SELECT id, amount FROM cart_items WHERE cart_id = :cart_id AND product_id = :product_id';
$placeholders = [
    ':cart_id' => $cart_id,
    ':product_id' => $product_id
];

Database::query($sql, $placeholders);
$cart_item = Database::get();

if (empty($cart_item)) {
    $sql = 'INSERT INTO cart_items (cart_id, product_id, amount, customer_id) VALUES (:cart_id, :product_id, :amount, :customer_id)';
    $placeholders = [
        ':cart_id' => $cart_id,
        ':product_id' => $product_id,
        ':amount' => $quantity,
        ':customer_id' => $customer_id
    ];
} else {
    $sql = 'UPDATE cart_items SET amount = amount + :amount WHERE id = :id';
    $placeholders = [
        ':amount' => $quantity,
        ':id' => $cart_item['id']
    ];
}

Database::query($sql, $placeholders);

$_SESSION['cart'] = $cart_id;
$_SESSION['cart_product_id'] = $product_id;

header('Location: ../../cart.php');
exit();
?>