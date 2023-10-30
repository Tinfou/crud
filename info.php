<?php
session_start();
require('db_connect.php'); ?>

<?php
if (!isset($_SESSION['user_logged'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
    if (isset($_GET['id_user'])) {
        $id = $_GET['id_user'];
        $sql = "SELECT * FROM users where id_user = '$id' ";
        $execute_query = mysqli_query($connexion, $sql);
        $result = mysqli_fetch_assoc($execute_query);
    }
    ?>
    <div class="container p-4">
        <div class="d-flex justify-content-center">
            <div class="row ">
                <div class="p-2 col-md-12">
                    <label class="form-label" for="nom">Nom:
                        <?php echo $result['nom'] ?>
                    </label>
                    <hr>

                </div>
                <div class="p-2 col-md-12">
                    <label class="form-label" for="email">Email:
                        <?php echo $result['email'] ?>
                    </label>
                    <hr>

                </div>
                <div class="p-2 col-md-12">
                    <label class="form-label" for="phone">Phone:
                        <?php echo $result['phone'] ?>
                    </label>
                    <hr>

                </div>
                <div class="p-2 col-md-12 ">
                    <label class="form-label" for="image">Photo de profil</label>
                    <img class="rounded mx-start d-block mb-2" src="images/<?php echo $result['image']; ?>"
                        style="width: 60px; height: 60px;">
                    <hr>
                </div>
                <div class="d-flex justify-content-center ">
                    <a class="w-25 btn btn-danger " href="index.php">retour</a>
                </div>
            </div>
        </div>
    </div>
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</body>

</html>