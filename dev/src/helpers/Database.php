<?php 
    class dbconnection extends PDO {
        private $host = '127.0.0.1';
        private $dbname = 'webshop';
        private $user = 'root';
        private $pass = 'root';

        public function __construct()
        {
            try {
                parent::__construct("mysql:host=" . $this->host . ";dbname=" . $this->dbname . "; charset=utf8", $this->user, $this->pass);
                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException) {

            }
        }
    }




?> 