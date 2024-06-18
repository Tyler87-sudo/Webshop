<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
session_start();

require_once "../dev/src/Database/Database.php";
require_once "../dev/templates/header.inc.php";
require_once "../dev/src/helpers/sessionmanager.php";

if (isset($_SESSION['messages']['loggedin'])) {
    {
        if ($_SESSION['messages']['loggedin'] == true) {
            if (!headers_sent()) {
                setMessage('login-messages', 'De winkelwagen is alleen te zien indien u bent ingelogd. Log a.u.b. in...');
                header('Location: ./login.php');
                exit();
            } else {
                die('Pagina kan niet getoond worden als u niet bent ingelogd');
            }
        }
    }
}



Database::query("SELECT 
      `cart_items`.`id`, 
      `cart_items`.`cart_id`, 
      `cart_items`.`product_id`, 
      `cart_items`.`amount`,
      `cart`.`customer_id`,
      `products`.`product_type`,
      `products`.`product_name`,
      `products`.`product_description`,
      `products`.`price`,
      `products`.`product_image_url`,
     (`cart_items`.`amount` * `products`.`price`) AS `product_total`
   FROM `cart_items`
   LEFT JOIN `products` ON `products`.`id` = `cart_items`.`product_id`
   LEFT JOIN `cart` ON `cart`.`id` = `cart_items`.`cart_id`
   WHERE `cart`.`customer_id` = :customer_id AND `cart`.`ordered` = 0", [":customer_id" => user_id()]);


$cart_items = Database::getAll();
$cart_total_amount = 0;
$cart_total_cost = 0.0;
$shipping_cost = 0.0;


foreach ($cart_items as $cart_item) {
    $cart_total_amount += intval($cart_item->amount);
    $cart_total_cost += floatval($cart_item->product_total);
}
$order_total = $cart_total_cost + $shipping_cost;

?>

<body>
    <main>
        <h1 class="underline"><i>Your Orders</i></h1>
        <?php if(count($orders) > 0): ?>
            <?php foreach ($orders as $order) : ?>
                <div class="product">
                    <img src="<?= $order['product_image_url']?>" class="productImg" style="width: 10vw; height: 20vh;">
                    <h3 class="productName"><?= $order['product_name']?></h3>
                    <p class="description"><?= $order['product_specs']?></p>
                    <p class="orderQuantity">Quantity: <?= $order['quantity']?></p>
                    <p class="orderTotal">Total: $<?= $order['total_price']?></p>
                </div>
                <br>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You have no orders in your basket.</p>
        <?php endif; ?>
    </main>
    <script src="js/script.js"></script>
</body>

</html>
