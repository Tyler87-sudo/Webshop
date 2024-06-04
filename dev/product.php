<?php

if(!isset($_GET['product_id'])) {
    header('Location: index.php');
    exit();
}

$product_id = intval($_GET['product_id']);

require_once '../dev/src/Database/Database.php';
$sql = 'SELECT * FROM products WHERE id = :product_id';
$placeholders = [ ':product_id' => $product_id ];

Database::query($sql, $placeholders);
$product = Database::get();

print_r($product["product_image_url"]);

include "../dev/templates/header.inc.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Product"</title>
    <link rel="stylesheet" href="../dev/css/style.css">
</head>

<body>

    <?php echo $product["product_image_url"]; ?>
    <!-- main start -->
    <br>
    <main>
        <div class="productThing">
            <div class="container">
                <div class="mySlides">
                    <img src="<?= $product["product_image_url"] ?>">
                </div>

                <div class="mySlides">
                    <img src="img/producten/cry_2.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <img src="img/producten/cry_3.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <img src="img/producten/cry_4.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <img src="img/producten/cry_5.png" style="width:100%">
                </div>

                <div class="mySlides">
                    <img src=<?php $product["product_image_url"] ?> style="width:100%">
                </div>

<!--                <a class="prev" onclick="plusSlides(-1)">❮</a>-->
<!--                <a class="next" onclick="plusSlides(1)">❯</a>-->

                <div class="caption-container">
                    <p id="caption"></p>
                </div>

                <div class="row">
                    <div class="column">
                        <img class="demo cursor" src="img/producten/cry_1.png" style="width:100%" onclick="currentSlide(1)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/producten/cry_2.png" style="width:100%" onclick="currentSlide(2)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/producten/cry_3.png" style="width:100%" onclick="currentSlide(3)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/producten/cry_4.png" style="width:100%" onclick="currentSlide(4)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/producten/cry_5.png" style="width:100%" onclick="currentSlide(5)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="img/producten/cry_6.png" style="width:100%" onclick="currentSlide(6)">
                    </div>
                </div>
            </div>
            <h1 class="Anton" id="product"><?= $product['product_name']?></h1>
            <h2 class="Anton" id="price">&euro;<?= $product['price']?></h2>
            <button onclick="order()" id="order"><strong>ORDER</strong></button>
        </div>
        <div class="specsTab">
            <h3 class="specTitle">Specifications</h3>
            <table id="specs">
                <tr>
                    <td id="specTab1">Lorum</td>
                </tr>
                <tr>
                    <th id="specTab2">Lorum</th>
                </tr>
                <tr>
                    <td id="specTab3">Lorum</td>
                </tr>
                <tr>
                    <th id="specTab4">Lorum</th>
                </tr>
                <tr>
                    <td id="specTab5">Lorum</td>
                </tr>
            </table>
        </div>
    </main>
    <!-- main end -->
    <script defer src="js/script.js"></script>
</body>

</html>