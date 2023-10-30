<?php
$server_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'gestion_users';

$connexion = mysqli_connect($server_name, $user_name, $password, $db_name);

if (!$connexion) {
    die("impossible de se connecter");
}
?>