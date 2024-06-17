<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMP's</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php

require_once "../dev/src/Database/Database.php";
include "../dev/templates/header.inc.php";
Database::query("SELECT * FROM products WHERE product_type = 'AMP'");
$products = Database::getAll();
?>

<body>
    <?php require_once "templates/header.inc.php";?>
    <!-- Main start -->
    <main>
        <br>
        <h1 class="underline"><i>AMP's</i></h1>
        <?php foreach ($products as $product) : ?>
            <div class="product">
                <img src="<?= $product['product_image_url']?>" class="productImg" style="width: 10vw; height: 20vh;">
                <h3 class="productName"><?= $product['product_name']?></h3>
                <p class="description"><?= $product['product_specs']?></p>
                <button onclick="order()" class="catOrder">Put 1 in cart</button>
            </div>
            <br>
        <?php endforeach; ?>
    </main>
    <!-- main end -->
    <script defer src="js/script.js"></script>
</body>

</html>