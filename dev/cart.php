<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php 
require_once "../dev/src/Database/Database.php";
include "../dev/templates/header.inc.php";

Database::query("SELECT * FROM orders WHERE user_id = :user_id");
Database::bind(':user_id', $_SESSION['user_id']);
$orders = Database::getAll();
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
