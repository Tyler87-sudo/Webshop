<?php
session_start();

require_once '../dev/src/Database/Database.php';
require_once "../dev/templates/header.inc.php";
require_once "../dev/src/helpers/sessionmanager.php";

if(!isset($_GET['product_id'])) {
    header('Location: index.php');
    exit();
}

$product_id = intval($_GET['product_id']);


$sql = 'SELECT * FROM products WHERE product_id = :product_id';
$placeholders = [ ':product_id' => $product_id ];

Database::query($sql, $placeholders);
$product = Database::getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link rel="stylesheet" href="../dev/css/style.css">
</head>

<body>
    <!-- main start -->
    <br>
    <main>
        <div class="productThing">
            <div class="container">
                <?php
                $i = 0;
                foreach ($product as $products) : ?>
                <div class="mySlides">
                    <img src="<?= $product[$i]['product_image_url']?>" style="width: 25vw; height: 75vh">
                </div>
                    <?php $i++; ?>
                <?php endforeach ?>


                <div class="caption-container">
                    <p id="caption"></p>
                </div>
                <?php $i = 0 ?>
                <?php foreach ($product as $products) : ?>
                <div class="row" style="align-self: center">
                    <div class="column">
                        <img class="demo cursor" src="<?= $product[$i]['product_image_url']?>"  onclick="currentSlide([<?= $i + 1?>])">
                    </div>
                </div>
                <?php  $i++ ?>
                <?php endforeach ?>
            </div>

            <h1 class="Anton" id="product"><?= $product[0]['product_name']?></h1>
            <h2 class="Anton" id="price">&euro;<?= $product[0]['price']?></h2>
            <button onclick="order()" id="order"><strong>ORDER</strong></button>
        </div>
        <div class="specsTab">
            <h3 class="specTitle">Specifications</h3>
            <table id="specs">
                <tr>
                    <td id="specTab1"><?= $product[0]['product_specs']?></td>
                </tr>
            </table>
        </div>
    </main>
    <!-- main end -->
    <script src="js/script.js"></script>
</body>

</html>