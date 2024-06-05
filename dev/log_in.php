<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a href="amps.php">AMP's</a>
            <a href="pedals.php">Pedals</a>
            <div class="copy">&copy;The Crazy String 2024</div>
        </div>
        <a href="index.html">
            <img src="img/icons/home.svg">
        </a>
        <input type="text" placeholder="Search...">
        <img src="img/icons/shopping_cart_24dp_FILL0_wght400_GRAD0_opsz24.svg" id="cart">
        <a href="log_in.html">
            <img src="img/icons/account_circle.svg" id="account">
        </a>
    </div>
    <!-- navbar end -->
    <!-- main start -->
    <main>
        <br><br><br>
        <div class="logInField">
            <h1 class="title">Log in</h1>
            <br><br>
            <p><i><strong>Username</strong></i></p>
            <input type="text" id="username">
            <p><i><strong>Password</strong></i></p>
            <input type="password" id="password">
            <br><br><br><br><br><br>
            <button onclick="logIn()" id="login"><b>Log in</b></button>

        </div>
    </main>
    <!-- main eind -->
</body>

</html>