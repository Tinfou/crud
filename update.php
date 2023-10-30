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
    <title>Modification</title>
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
</head>

<body>
    <?php include('header.html'); ?>
    <?php
    if (isset($_GET['id_user'])) {
        $id = $_GET['id_user'];
        $sql = "SELECT * FROM users where id_user = '$id' ";
        $execute_query = mysqli_query($connexion, $sql);
        $result = mysqli_fetch_assoc($execute_query);
    }
    ?>
    <div class="container p-4">
        <?php include('message.php') ?>
        <div class="d-flex justify-content-center">
            <form class="g-3" action="" method="post" enctype="multipart/form-data">
                <div class="p-2 col-md-12">
                    <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $result['nom'] ?>">
                </div>
                <div class="p-2 col-md-12">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email"
                        value="<?php echo $result['email'] ?>">
                </div>
                <div class="p-2 col-md-12">
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control" type="text" name="phone" id="phone"
                        value="<?php echo $result['phone'] ?>">
                </div>
                <div class="p-2 col-md-12 text-center">
                    <label class="form-label" for="image">Photo de profil</label>
                    <img class="rounded mx-auto d-block mb-2" src="images/<?php echo $result['image']; ?>"
                        style="width: 60px; height: 60px;"><input class="form-control" type="file" name="image"
                        id="image">
                </div>
                <div class="col-md-12">
                    <button class="w-100 mt-3 btn btn-warning" type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone'])) {
    if (valid_name($_POST['nom'])) {
        $nom = $_POST['nom'];
    }
    if (valid_email($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (valid_phone($_POST['phone'])) {
        $phone = $_POST['phone'];
    }
    $default_image = $result['image'];
    if ($default_image) {
        $image = $default_image;
    } elseif (valid_image($_FILES['image'])) {
        $image = $_FILES['image']['name'];
    }
    $dossier_site = 'images/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $dossier_site);
    $sql = " UPDATE `users` SET `nom`='$nom',`email`='$email',`phone`='$phone',`image`='$image' WHERE id_user = '$id' ";
    $execute_query = mysqli_query($connexion, $sql);
    if ($execute_query) {
        $_SESSION['message'] = "Modification terminé";
        header("Location: index.php");
    } else {
        $_SESSION['message'] = "Modification non terminé";
        header("Location: update.php");
    }
}
?>