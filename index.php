<?php include('db_connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <p><input type="text" name="nom" placeholder="Nom"></p>
    <p><input type="text" name="prenom" placeholder="Prenom"></p>
    <p><input type="date" name="date_naissance" placeholder="Date de naissance"></p>
    <p><input type="email" name="email" placeholder="Email"></p>
    <p><input type="text" name="password" placeholder="Password"></p>
    <p><button type="submit">Ajouter</button></p>
</form>

<p><a href="list.php">Liste</a></p>

<?php
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['email']) && isset($_POST['password'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_naissance = $_POST['date_naissance'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (id_user, nom, prenom, date_naissance, email, password) VALUES (null,'$nom','$prenom','$date_naissance','$email','$password')";
        $results = mysqli_query($connection,$sql);
        if(!$results){
            echo "erreur" . mysqli_error($connection);
        }
    }
?>
    
</body>
</html>