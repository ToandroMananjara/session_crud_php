<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $key = "12345";
    $_SESSION["key"] = $key;
    $destinataire = $email;
    $subject = "Code de recuperation";
    $message = "Votre code de recuperation est : " . " " . $key;
    $expediteur = "From: me@univ.com";
    echo $email;
    mail($destinataire, $subject, $message, $expediteur);
    header("location: ./verifyCode.php");
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
                <h3 style="font-size:25px;">Mot de passe oublié</h3>
            </div>
            <div class="form-forget">
                <form action="" method="post">
                    <label for="email" class="form-label">Votre email:</label><br>
                    <input type="email" class="form-control input" name="email" required>
                    <button type="submit" class="mail-send ">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>