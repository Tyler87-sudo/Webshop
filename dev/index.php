
<?php

    include "../dev/templates/header.inc.php"; 
    include "../dev/templates/footer.inc.php";
    require_once "../dev/src/Database/Database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    
<?php 
    Database::query("SELECT * FROM products");
    $products = Database::getAll();
    Database::query("SELECT * FROM users");
    $users = Database::getAll();
?>

<main>
    <h1><i><?php echo $users[0]['username']?></i></h1>
    <div class="sale">
      <h1 class="underline">Spotlight</h1>
      <div class="container" id="container-sale">
          <?php foreach ($products as $product) : ?>
        <a href="product.php?product_id=<?= $product['id'] ?>">
          <img src=<?php echo $product['product_image_url']?>>
          <?php endforeach; ?>
            <a/>
      </div>
      <div class="categories">
        <h1 class="underline">Categories</h1>
        <div class="container" id="container-categories">
          <a href="guit_bass.html">
            <img src="img/producten/sg_1.png">
          </a>
          <a href="amps.html">
            <img src="img/producten/katana_1.png">
          </a>
          <a href="pedals.html">
            <img src="img/producten/cry_1.png">
          </a>
        </div>
      </div>

    </div>
  </main>
</body>
</html>


