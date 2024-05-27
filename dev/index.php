
<?php

    include "../dev/templates/header.inc.php"; 
    include "../dev/templates/footer.inc.php";
    require "../dev/src/helpers/Database.php";
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
    $db = new dbconnection();

    $products = "SELECT * FROM products";

    $query = $db->prepare($sql);

    $query->execute();

    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);

    print_r($recset);
?>
</body>
</html>


