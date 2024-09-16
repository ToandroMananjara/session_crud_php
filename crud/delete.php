<?php
session_start();
require('../models/Etudiant.php');
require('../config/Database.php');

$id = $_GET['id'];
$data = new Database();
$conn = $data->getConnexion();

$etudiant = new Etudiant($conn);
$etudiant->id = $id;
$etudiant->delete();
header("Location: ./index.php");
?>