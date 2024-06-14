<?php

class Database {
    static private string $host = 'localhost';
    static private string $dbName = 'webshop';
    static private string $user = 'Admin';
    static private string $pass = 'vSb20ieI_M.7)[T2';

    private static $dbConnection = null;
    private static $dbStatement = null;

    private static function connect()
    {
        try {
            self::$dbConnection = new PDO(
                "mysql:host=".self::$host.";dbname=".self::$dbName, self::$user, self::$pass
            );
        } catch (PDOException $e){}
    }

    public static function query(string $sql, array $placeholders = []) {

        if (is_null(self::$dbConnection)) { 
            self::connect();
        }

        self::$dbStatement = self::$dbConnection->prepare($sql);
        self::$dbStatement->execute($placeholders);
    }

    public static function getAll() {
        if(is_null(self::$dbConnection) || is_null(self::$dbStatement)) {
            return [];
        }

        return self::$dbStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get() {
        if(is_null(self::$dbConnection) || is_null(self::$dbStatement)) {
            return [];
        }

        return self::$dbStatement->fetch(PDO::FETCH_ASSOC);
    }
}

