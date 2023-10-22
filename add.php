<?php include('db_connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="add.php" method="post" enctype="multipart/form-data">
    <p><input type="text" name="nom" placeholder="Nom"></p>
    <p><input type="email" name="email" placeholder="Email"></p>
    <p><input type="text" name="phone" placeholder="phone"></p>
    <p><input type="file" name="image"></p>
    <p><button type="submit" >Ajouter</button></p>
</form>

<p><a href="index.php">Liste</a></p>

<?php
    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_FILES['image'])){
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $image = $_FILES['image']['name'];
        $dossier_site = 'images/' .$image;
        move_uploaded_file($_FILES['image']['tmp_name'],$dossier_site); 
        

        $sql = "INSERT INTO `users`(`id_user`, `nom`, `email`, `phone`, `image`) VALUES (null,'$nom','$email','$phone','$image')";
        $results = mysqli_query($connection,$sql);
        if($results){
            header("Location: index.php");
        }
    }
?>
    
</body>
</html>