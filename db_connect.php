<?php
    $connection = mysqli_connect('localhost', 'root', '','gestion_users');

    if(!$connection){
        die("impossible de se connecter");
    }
?>