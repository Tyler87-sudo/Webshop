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
      $type = "Electric Guitar";
    Database::query("SELECT * FROM products WHERE product_type = '$type'");
    $products = Database::getAll();
    Database::query("SELECT * FROM products");
    $x = Database::get();
?>

<main>
    <div class="sale">
      <h1 class="underline">Spotlight</h1>
      <div class="container" id="container-sale">
          <?php foreach ($products as $product) : ?>
        <a href="product.php?product_id=<?= $product['product_id'] ?>">
          <img src=<?php echo $product['product_image_url']?>>
          <?php endforeach; ?>
      </div>
      <div class="categories">
        <h1 class="underline">Categories</h1>
        <div class="container" id="container-categories">
          <a href="guit_bass.php"><img src="<?php echo $product['product_image_url']?>"</a>
          <a href="amps.php"><img src="img/producten/katana_1.png"></a>
          <a href="pedals.php"><img src="img/producten/cry_1.png"></a>
        </div>
      </div>

    </div>
  </main>
</body>
</html>
