<?php


    class database
    {
        private $host = "127.0.0.1";
        private $database_name = "vuejs";
        private $username = "root";
        private $password = "";
        /*
        private $host = "olivecrazitouna.mysql.db";
        private $database_name = "olivecrazitouna";
        private $username = "olivecrazitouna";
        private $password = "xVVaCZCrKx5r";
        */
        //mysql://olivecrazitouna:xVVaCZCrKx5r@olivecrazitouna.mysql.db:3306/olivecrazitouna
        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }

    }
