<?php
session_start();
require 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
</head>

<body>
    <?php include('header.html'); ?>
    <div class="container p-4">
        <div class="d-flex justify-content-center">
            <form class="g-3" action="login.php" method="post" enctype="multipart/form-data">
                <div class="p-2 col-md-12">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="p-2 col-md-12">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="col-md-12">
                    <button class="w-100 mt-3 btn btn-primary" type="submit">Ajouter</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `users`";
            $execute_query = mysqli_query($connexion, $sql);
            while ($result = mysqli_fetch_assoc($execute_query)) {
                if ($result['email'] == $email && $result['password'] == $password) {
                    $_SESSION['user_logged'] = [
                        'id_user' => $result['id_user'],
                        'nom' => $result['nom'],
                    ];

                }
                if (isset($_SESSION['user_logged'])) {
                    header('Location: index.php');
                } else {
                    header('Location: login.php');
                }
            }

        }
        ?>
    </div>
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</body>

</html>