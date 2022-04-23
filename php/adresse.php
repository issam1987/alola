<?php
    class adresse{
        // Connection
        private $conn;
        // Table
        private $db_table = "adresse";
        // Columns
        public $id;
        public $label;
        public $type;
        public $created;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getAdresses(){
            $sqlQuery = "SELECT id, label, type, created FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createAdresse(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        label = :label, 
                        type = :type, 
                        id = :id, 
                        created = :created";

            $stmt = $this->conn->prepare($sqlQuery);

            // sanitize
            $this->label=htmlspecialchars(strip_tags($this->label));
            $this->type=htmlspecialchars(strip_tags($this->type));
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->created=htmlspecialchars(strip_tags($this->created));

            // bind data
            $stmt->bindParam(":label", $this->label);
            $stmt->bindParam(":type", $this->type);
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":created", $this->created);

            if($stmt->execute()){
                return true;
            }
            return false;
        }
     
    }
?>
