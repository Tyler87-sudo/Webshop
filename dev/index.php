
<?php

    class dbconnection extends PDO {
        private $host = "localhost";
        private $dbname = "Webshop";
        private $user = "root";
        private $pass = "root";

        public function __construct()
        {
            parent::__construct("mysql:host=" . $this->host . ";dbname=" . $this->dbname . "; charset=utf8", $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
    }


    $db = new dbconnection();

    $sql = "SELECT * FROM users";

    $query = $db->prepare($sql);

    $query->execute();

    $recset = $query -> fetchAll(PDO::FETCH_ASSOC);



    $chosenindex = random_int(0, 10)

    ?>