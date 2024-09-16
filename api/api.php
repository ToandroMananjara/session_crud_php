<?php
require('../config/Database.php');
require('../models/Etudiant.php');

header('Content-Type:application/json');
$data = new Database();
$conn = $data->getConnexion();

$etudiant = new Etudiant($conn);
$datas = $etudiant->readAll();

// Output the JSON results
if (isset($datas)) {
    echo json_encode($datas);
} else {
    echo json_encode([]);
}
