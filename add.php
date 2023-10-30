<?php
session_start();
require('db_connect.php');
require('functions.php');
?>

<?php
if (!isset($_SESSION['user_logged'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
</head>

<body>
    <div class="fluid">
        <div class="bg-primary text-center">
            <h3 class="p-2">CRUD PHP</h3>
        </div>
    </div>
    <div class="container p-2">
        <nav>
            <ul class="nav">
                <li><a class="nav-link" href="index.php">Listes des utilisateurs</a></li>
                <li><a class="nav-link" href="add.php">Ajouter des utilisateurs</a></li>
            </ul>
        </nav>
    </div>
    <div class="container p-4">
        <div class="d-flex justify-content-center">
            <form class="g-3" action="add.php" method="post" enctype="multipart/form-data">
                <div class="p-2 col-md-12">
                    <label class="form-label" for="nom">Nom</label>
                    <input class="form-control" type="text" name="nom" id="nom">
                </div>
                <div class="p-2 col-md-12">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="p-2 col-md-12">
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control" type="text" name="phone" id="phone">
                </div>
                <div class="p-2 col-md-12">
                    <label class="form-label" for="image">Photo de profil</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="col-md-12">
                    <button class="w-100 mt-3 btn btn-primary" type="submit" name="submit">Ajouter</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            if (isset($_POST['submit'])) {
                if (valid_name($_POST['nom'])) {
                    $nom = $_POST['nom'];
                }
                if (valid_email($_POST['email'])) {
                    $email = $_POST['email'];
                }
                if (valid_phone($_POST['phone'])) {
                    $phone = $_POST['phone'];
                }
                if (valid_image($_FILES['image'])) {
                    $image = $_FILES['image']['name'];
                    $dossier_site = 'images/' . $image;
                    move_uploaded_file($_FILES['image']['tmp_name'], $dossier_site);
                }
                $sql = "INSERT INTO `users`(`id_user`, `nom`, `email`, `phone`, `image`) VALUES (null,'$nom','$email','$phone','$image')";
                $execute_query = mysqli_query($connexion, $sql);
                if ($execute_query) {
                    header("Location: index.php");
                }
            }
        }
        ?>
    </div>
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</body>

</html>