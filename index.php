<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Login page</title>
</head>

<body>
    <div id="root">
        <div class="container">
            <div class="form-container">
                <div class="form">
                    <?php
                    session_start();
                    if (isset($_SESSION['errorMessage'])) {
                        // Affichez le message d'erreur
                        echo "<span class='error-message'>" . $_SESSION['errorMessage'] . "</span>";

                        // Supprimez le message d'erreur de la session pour qu'il ne s'affiche pas à nouveau lors des requêtes suivantes
                        unset($_SESSION['errorMessage']);
                    }
                    ?>
                    <h1>Login</h1>
                    <form action="./traitement.php" method="post">
                        <label for="username">Username:</label><br>
                        <input type="text" name="username" id="username" class="input" placeholder="Entrer username" required><br>
                        <label for="password">Password:</label><br>
                        <div class="password-container">
                            <input type="password" name="password" id="password" class="input" placeholder="Entrer password" required><br>
                            <div class="icon">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </div>
                        </div>
                        <input type="submit" id="login" value="log in">
                        <div class="mot-passe-oublié ">
                            <a href="./forgetMdp/mdpForget.php">Mot de passe oublié ?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>