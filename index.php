<?php
session_start();
require('db_connect.php');
?>

<?php
if (!isset($_SESSION['user_logged'])) {
    header('Location: login.php');
}
?>
<?php
$sql = 'SELECT COUNT(*) as nbr_id_user FROM `users`;';
$execute_query = mysqli_query($connexion, $sql);
$result = mysqli_fetch_assoc($execute_query);
$nbr_element_page = 4;
$nbr_page = ceil($result['nbr_id_user'] / $nbr_element_page);
@$page = $_GET["page"];
$debut = ($page - 1) * $nbr_element_page;
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
    <div class="card">
        <?php include('header\header.html'); ?>
        <?php include('header\navbar.php'); ?>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <?php include('message.php') ?>
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
                            $sql = "SELECT * FROM `users` LIMIT $debut,$nbr_element_page";
                            $execute_query = mysqli_query($connexion, $sql);
                            while ($result = mysqli_fetch_assoc($execute_query)) {
                                ?>
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
                            </tbody>
                            <?php
                            }
                            ?>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Précendent</a>
                            </li>
                            <?php for ($i = 1; $i <= $nbr_page; $i++) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=<?php echo $i ?>">
                                        <?php echo $i ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="page-item <?php echo $page >= $nbr_page ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Suivant</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <?php include('header\footer.html') ?>
    </div>
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</body>

</html>