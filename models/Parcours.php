<?php
    class Parcours {

        private $table = "parcours";
        private $connexion = null;

        public $id;
        public $nom;

        public function __construct($db)
        {
            if ($this->connexion == null) {
                $this->connexion = $db;
            }
        }
        
        public function readAll(){
            $sql = "SELECT * FROM $this->table";
            $query = $this->connexion->query($sql);
            $datas = $query->fetchAll(PDO::FETCH_OBJ);
            return $datas;  
        }
    }
?>