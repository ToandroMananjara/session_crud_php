<?php
class Etudiant
{
    private $table = "etudiant";
    private $connexion = null;
    
    public $id;
    public $nom;
    public $prenom;
    public $parcours;
    public $date_naissance;
    public $adresse;
    public $sexe;
 
    public function __construct($db)
    {
        if ($this->connexion == null) {
            $this->connexion = $db;
        }
    }

    // lecture dans la base de donnée
    public function create()
    {
        $sql = "insert into etudiant (nom,prenom,parcours,date_naissance,adresse,sexe) values ('$this->nom',
                    '$this->prenom','$this->parcours','$this->date_naissance','$this->adresse','$this->sexe')";
        $query = $this->connexion->query($sql);
    }

    public function readAll()
    {
        $sql = "SELECT * FROM etudiant";
        $query = $this->connexion->query($sql);
        $datas = $query->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    public function readById()
    {
        $sql = "SELECT * FROM etudiant where id=$this->id";
        $query = $this->connexion->query($sql);
        $datas = $query->fetch(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function update()
    {
        $sql = "UPDATE  etudiant set nom='$this->nom',prenom='$this->prenom',parcours='$this->parcours',
        date_naissance='$this->date_naissance',adresse='$this->adresse',sexe='$this->sexe' where id=$this->id";
        $query = $this->connexion->query($sql);
    }

    public function delete()
    {
        $sql = "DELETE from etudiant where id=$this->id";
        $query = $this->connexion->query($sql);
    }
}
