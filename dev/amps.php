<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMP's</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once "../templates/header.inc.php";?>
    <!-- Main start -->
    <main>
        <br>
        <h1 class="underline"><i>AMP's</i></h1>
        <div class="product">
            <img src="img/example.png" class="productImg">
            <h3 class="productName">PRODUCT NAME</h3>
            <p class="description">DESCRIPTION</p>
            <button onclick="order()" class="catOrder">ORDER</button>
        </div>
        <br>
    </main>
    <!-- main end -->
    <script defer src="js/script.js"></script>
</body>

</html>