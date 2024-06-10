<?php
class Database {
    private static $pdo;

    public static function connect() {
        if (!self::$pdo) {
            self::$pdo = new PDO('mysql:host=your_host;dbname=your_dbname', 'your_username', 'your_password');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public static function query($sql, $placeholders = []) {
        self::connect();
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }
}
?>
