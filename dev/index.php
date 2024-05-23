
<?php

    require "../dev/src/helpers/Database.php";



$host = 'localhost';
$db = 'webshop';
$user = 'Admin';
$password = 'vSb20ieI_M.7)[T2';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";


try {
    $pdo = new PDO($dsn, $user, $password);

    if ($pdo) {
        echo "Connected to the $db database successfully!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
};

    $stmt = $pdo ->query('SELECT * FROM users');

    $row = $stmt -> fetch(PDO::FETCH_ASSOC);

    echo "<br>" . $row['Username'];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>" . $row['Username'] . "</p>";
    }
   ?>