<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMP's</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- navbar start-->
    <div class="nav">
        <img src="img/icons/menu.svg" id="menu_butt">
        <div id="slide_menu">
            <img src="img/Logo.png" class="Logo" width="100%" height="100%">
            <a href="index.html">Home</a>
            <a href="guit_bass.html">Guitar/Bass</a>
            <a href="amps.html">AMP's</a>
            <a href="pedals.php">Pedals</a>
            <div class="copy">&copy;The Crazy String 2024</div>
        </div>
        <a href="index.html">
            <img src="img/icons/home.svg">
        </a>
        <input type="text" placeholder="Search...">
        <img src="img/icons/shopping_cart_24dp_FILL0_wght400_GRAD0_opsz24.svg" id="cart">
        <a href="log_in.php">
            <img src="img/icons/account_circle.svg" id="account">
        </a>
    </div>
    <!-- navbar end -->
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