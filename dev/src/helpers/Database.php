<?php

class dbconnection extends PDO {
    private $host = "localhost";
    private $dbname = "webshop";
    private $user = "Admin";
    private $pass = "vSb20ieI_M.7)[T2";

    public function __construct()
    {
       $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
       try {
            parent::__construct($dsn, $this->user, $this->pass, array(
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        } catch (PDOException $e){
            echo $e->getMessage();
        } 
    }
}
?>
