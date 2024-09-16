<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('./models/Admin.php');
    require('./config/Database.php');

    session_start();
    $data = new Database();
    $conn = $data->getConnexion();
    $admin = new Admin($conn);
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $isAdmin = $admin->testAdmin($username, $password);
    $_SESSION["username"] = $username;
    
    if ($isAdmin) {
        header("location: ./crud/add_new.php");
    } else {
        $_SESSION['errorMessage'] = "Username ou mot de passe incorrect";
        header("location: ./index.php");
    }
}

?>