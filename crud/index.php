<?php
session_start();
if (isset($_SESSION["username"])) {
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
    <title>Listes</title>
</head>

<body>


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

        <main class="mt-2 p-2">

            <div class="p-2" style="box-shadow: 0em .5em 1em  #b8b4b4;width:100%;">
                <hr>
                <div class="search-container d-flex justify-content-start">
                    <div class="w-25 p-2" style="box-shadow: 0em 0.1em .1em #b8b4b4;width:100%;background:#604ca3;border-radius:1em;">
                        <!-- <label for="search" class="form-label">Search:</label> -->
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search...">
                    </div>
                </div>
                <hr>
                <?php
                session_start();
                if (isset($_SESSION['successMessage'])) {
                    // Affichez le message d'erreur
                    echo "<h6 class='success-message text-center text-success fs-3' >" . $_SESSION['successMessage'] . "<span class='cancel' style='padding-left:1em;padding-right:1em;' > <i class='fa fa-times' aria-hidden='true'></i> </span>"
                        . "</h6>";

                    // Supprimez le message d'erreur de la session pour qu'il ne s'affiche pas à nouveau lors des requêtes suivantes
                    unset($_SESSION['successMessage']);
                }
                ?>
                <table class="table ">
                    <thead class="w-100 table-dark">
                        <tr>
                            <th scope="col" class="table-title"># <span><i class="fa fa-sort-down" aria-hidden="true"></i></span></th>
                            <th scope="col" class="table-title">Nom <span><i class="fa fa-sort-down" aria-hidden="true"></i></span></th>
                            <th scope="col" class="table-title">Prenom <span><i class="fa fa-sort-down" aria-hidden="true"></i></span></th>
                            <th scope="col" class="table-title">Parcours <span><i class="fa fa-sort-down" aria-hidden="true"></i></span></th>
                            <th scope="col" class="table-title">Date de naissance <span><i class="fa fa-sort-down" aria-hidden="true"></i></span></th>
                            <th scope="col" class="table-title">Adresse <span><i class="fa fa-sort-down" aria-hidden="true"></i></span></th>
                            <th scope="col" class="table-title">Sexe <span><i class="fa fa-sort-down" aria-hidden="true"></i></span></th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-table">

                    </tbody>
                </table>

                <div class="pagination d-flex justify-content-center gap-3 m-2">
                    <div class="preview" id="preview" onclick="">Preview</div>
                    <div class="next" id="next" onclick="">Next</div>
                </div>
            </div>
        </main>

    </div>
    <script src="./js/index.js"></script>
</body>

</html>
<?php
} else {
    header("location: ../index.php");
}
?>