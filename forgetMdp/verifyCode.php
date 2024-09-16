<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('../models/Admin.php');
    require('../config/Database.php');

    $data = new Database();
    $conn = $data->getConnexion();
    $admin = new Admin($conn);
    
    $code = $_POST['code'];
    $key = $_SESSION["key"];

    if ($code == $key){

        $admin->login = $_SESSION["username"];
  
        $admin->password = $key;

        $admin->update();
        header("location: ../crud/add_new.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Mot de passe oublié</title>
</head>

<body>
    <div style="display: flex; justify-content:center;">
        <div class="forgot-mdp-container" style="box-shadow: 0em .5em 1em  #b8b4b4;width:fit-content;border-radius:1em; padding:2em;">
            <div class="">
                <h3 style="font-size:25px;">Entrer le code de confirmation</h3>
            </div>
            <div class="form-forget">
                <form action="" method="post">
                    <label for="code" class="form-label">Votre code:</label><br>
                    <input type="text" class="form-control input" name="code" required>
                    <button type="submit" class="mail-send ">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>