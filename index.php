<?php
session_start();
require('db_connect.php');
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
    <title>Liste</title>
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
</head>

<body>

    <div class="md-12">
        <div class="bg-primary text-center">
            <h3 class="p-2">CRUD PHP</h3>
        </div>
    </div>
    <div class="container p-2">
        <nav>
            <ul class="nav">
                <li><a class="nav-link" href="index.php">Listes des utilisateurs</a></li>
                <li><a class="nav-link" href="add.php">Ajouter des utilisateurs</a></li>
                <li><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <table class="table justify-content-center">
                <thead>
                    <tr class="table-primary text-center">
                        <th>photo</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from users";
                    $execute_query = mysqli_query($connexion, $sql);
                    while ($result = mysqli_fetch_assoc($execute_query)) {
                        ?>
                        <div class="pagination justify-content-center">
                            <tr class="text-center">
                                <td><img class="rounded mx-auto d-block" src="images/<?php echo $result['image']; ?>"
                                        style="width: 60px; height: 60px;"></td>
                                <td>
                                    <?php echo $result['nom'] ?>
                                </td>
                                <td>
                                    <?php echo $result['email'] ?>
                                </td>
                                <td>
                                    <?php echo $result['phone'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-info"
                                        href="info.php?id_user=<?php echo $result['id_user']; ?>">Details</a>
                                    <a class="btn btn-danger"
                                        href="delete.php?id_user=<?php echo $result['id_user']; ?>">Supprimer</a>
                                    <a class="btn btn-warning"
                                        href="update.php?id_user=<?php echo $result['id_user']; ?>">Modifier</a>
                                </td>
                            </tr>
                        </div>
                    </tbody>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</body>

</html>