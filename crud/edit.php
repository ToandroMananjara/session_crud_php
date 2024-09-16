<?php
$id = $_GET["id"];
if (isset($_POST["submit"])) {
    session_start();
    require('../models/Etudiant.php');
    require('../config/Database.php');

    echo "eto pr";
    $data = new Database();
    $conn = $data->getConnexion();
    $etudiant = new Etudiant($conn);
    $etudiant->id = $_GET['id'];
    $etudiant->nom = $_POST['nom'];
    $etudiant->prenom  = $_POST['prenom'];
    $etudiant->parcours = $_POST['parcours'];
    $etudiant->date_naissance = $_POST['date_naissance'];
    $etudiant->adresse = $_POST['adresse'];
    $etudiant->sexe = $_POST['sexe'];


    if (!empty($etudiant->nom) && !empty($etudiant->prenom) && !empty($etudiant->parcours) && !empty($etudiant->date_naissance)  && !empty($etudiant->adresse) && !empty($etudiant->sexe)) {
        $etudiant->update();
        header("location: ./index.php");
    }
    header("Location: ./index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Add new user</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        require('../models/Etudiant.php');
        require('../config/Database.php');
        require('../models/Parcours.php');

        $data = new Database();
        $conn = $data->getConnexion();
        $_parcours = new Parcours($conn);
        $listParcours = $_parcours->readAll();
        $etudiant = new Etudiant($conn);
        $etudiant->id = $_GET['id'];
        $result = $etudiant->readById();

        $nom = $result['nom'];
        $prenom = $result['prenom'];
        $parcours = $result['parcours'];
        $date_naissance = $result['date_naissance'];
        $adresse = $result['adresse'];
        $sexe = $result['sexe'];
    } else {
        header("location: ../index.php");
    }

    ?>

    <div id="root">
        <header>
            <div class="header">
                <div class="logo">Logo</div>

                <nav class="navbar-container">
                    <ul>
                        <li><a href="./add_new.php">Add new</a></li>
                        <li><a href="./index.php">Lists</a></li>
                    </ul>
                </nav>

                <a href="../destroy.php">
                    <span class="logout"> Log out</span>
                </a>
            </div>
        </header>

        <main class="mt-4">
            <div class="container p-5" style="box-shadow: 0em .5em 1em  #b8b4b4;width:fit-content;border-radius:1em;">
                <div class="container">
                    <div class="text-center mb-5">
                        <h3>Edit user</h3>
                        <p class="text-muted">
                            Complete the form below to edit new user
                        </p>
                    </div>
                </div>

                <div class="container d-flex justify-content-center">
                    <form action="" method="post" style="width:50vw; min-width:300px;">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="nom" class="form-label">First name:</label>
                                <input type="text" class="form-control" name="nom" placeholder="Your first name" value="<?php echo $nom ?>" required>
                            </div>

                            <div class="col">
                                <label for="prenom" class="form-label">Last name:</label>
                                <input type="text" class="form-control" name="prenom" placeholder="Your last name" value="<?php echo $prenom ?>" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label for="parcours" class="form-label">Parcours:</label>

                                <select name="parcours" id="" class="form-control" value="<?php echo $parcours ?>">
                                    <?php
                                    foreach ($listParcours as $key => $value) {
                                        echo "<option value='" . $value->nom . "' " . ($value->nom == $parcours ? 'selected' : "") . "> " . $value->nom . "</option>";                                   
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col">
                                <label for="date_naissance" class="form-label">Date de naissance:</label>
                                <input type="date" class="form-control" name="date_naissance" placeholder="" value="<?php echo $date_naissance ?>" required>
                            </div>
                        </div>

                        <div class="d-flex row justify-content-between mb-2">
                            <div class="col" style="width:50%">
                                <label for="sexe" class="form-label">sexe:</label><br>
                                <label for="sexe" class="form-label">Male:</label>
                                <input type="radio" name="sexe" value="male" class="ml-2" <?php if ($sexe == 'male') {
                                                                                                echo "checked";
                                                                                            } ?>>
                                <label for="sexe" class="form-label">Female:</label>
                                <input type="radio" name="sexe" value="female" <?php if ($sexe == 'female') {
                                                                                    echo "checked";
                                                                                } ?>>
                            </div>

                            <div class="col" style="width:50%">
                                <label for="adresse" class="form-label">Adresse:</label>
                                <input type="text" class="form-control" name="adresse" value="<?php echo $adresse ?>" required>
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-success" name="submit" style="padding-right:2em;padding-left:2em;">Save</button>
                            <a href="add_new.php" class=" btn btn-danger" style="padding-right:1.5em;padding-left:1.5em;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>


    </div>
    <script></script>
</body>

</html>