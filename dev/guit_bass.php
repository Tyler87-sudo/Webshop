<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guitar and Bass</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php 

require "../dev/src/helpers/Database.php";
include "../dev/templates/header.inc.php";

$db = new dbconnection();

$categories = "SELECT * FROM categories";

$query = $db->prepare($categories);

$query->execute();

$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <!-- Main start -->
    <main>
        <br>
        <h1 class="underline"><i>Guitar and Bass</i></h1>
        <?php 
        foreach ($recset as $cat) {
            print_r($cat["updated_at"]);
        } ?>
        <div class="product">
            <img src="img/example.png" class="productImg">
            <h3 class="productName">PRODUCT NAME</h3>
            <p class="description">DESCRIPTION</p>
            <button onclick="order()" class="catOrder">ORDER</button>
        </div>
        <br>
        
        <div class="product">
            <img src="img/example.png" class="productImg">
            <h3 class="productName">PRODUCT NAME</h3>
            <p class="description">DESCRIPTION</p>
            <button onclick="order()" class="catOrder">ORDER</button>
        </div>
        <br>
        <div class="product">
            <img src="img/example.png" class="productImg">
            <h3 class="productName">PRODUCT NAME</h3>
            <p class="description">DESCRIPTION</p>
            <button onclick="order()" class="catOrder">ORDER</button>
        </div>
        <br>
        <div class="product">
            <img src="img/example.png" class="productImg">
            <h3 class="productName">PRODUCT NAME</h3>
            <p class="description">DESCRIPTION</p>
            <button onclick="order()" class="catOrder">ORDER</button>
        </div>

    </main>
    <!-- main end -->
    <script defer src="js/script.js"></script>
</body>

</html>