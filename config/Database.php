<?php
class Database{
    // Propriété de connexion au base de donnée
    private $host = "localhost";
    private $dbname = "etudiant";
    private $user = "fokotany";
    private $password = "azertyuiop";
    
    // connexion à la base de donnée
    public function getConnexion(){
        $conn = null;
        try{
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        }
        catch(PDOException $e){
            $error = $e->getMessage();
            echo $error;
        }
        return $conn;
    }
}
?>