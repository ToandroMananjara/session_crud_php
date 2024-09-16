<?php
class Admin
{
    private $table = "admin";
    private $connexion = null;
    public $login;
    public $password;

    public function __construct($db)
    {
        if ($this->connexion == null) {
            $this->connexion = $db;
        }
    }

    // lecture dans la base de donnée
    public function create() {}

    public function readAll()
    {
        $sql = "SELECT * FROM $this->table";
        $query = $this->connexion->query($sql);
        $datas = $query->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    public function update()
    {
        $sql = "UPDATE  admin set password='$this->password' where username='$this->login'";
        $query = $this->connexion->query($sql);     
    }

    public function testAdmin($username, $password)
    {
        $sql = "SELECT * FROM $this->table where username = '$username' and password = '$password'";
        $query = $this->connexion->query($sql);
        $result = $query->fetch(PDO::FETCH_OBJ);
        if ($result) {
            return true;
        } else
            return false;
    }
}
