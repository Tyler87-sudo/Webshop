<?php
session_start();

require_once '../Database/Database.php';
require_once '../helpers/Auth.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../index.php');
    exit();
}

if(!isset($_POST['product_id']) || !isset($_POST['quantity'])) {
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
$placeholders = [ ':customer_id' => $customer_id ];

Database::query($sql, $placeholders);
$cart = Database::getAll();

$_SESSION['cart'] = $cart['id'];
$_SESSION['cart_product_id'] = $cart['product_id'];

if (count($cart) === 0) {
    $sql = 'INSERT INTO cart (customer_id, ordered) VALUES (:customer_id, 0)';
    Database::query($sql, [ ':customer_id' => $customer_id ]);
    $cart_id = Database::getLastInsertId();
} else {
    $cart_id = $cart[0]['id'];
}

$sql = 'SELECT id, amount FROM cart_items WHERE cart_id = :cart_id AND product_id = :product_id';
$placeholders = [
    ':cart_id' => $cart_id,
    ':product_id' => $product_id
];

Database::query($sql, $placeholders);
$cart_item = Database::getAll();
$_SESSION['cart_items'] = $cart_item[0]['product_id'];

if (count($cart_item) === 0) {
    $sql = 'INSERT INTO cart_items (cart_id, product_id, amount) VALUES (:cart_id, :product_id, :amount)';
    $placeholders = [
        ':cart_id' => $cart_id,
        ':product_id' => $product_id,
        ':amount' => $quantity
    ];
} else {
    $sql = 'UPDATE cart_items SET amount = amount + :amount WHERE product_id = :product_id';
    $placeholders = [
        ':amount' => $quantity,
        ':id' => $cart_item[0]['id']
    ];
}

Database::query($sql, $placeholders);

header('Location: ../../cart.php');
exit();
?>