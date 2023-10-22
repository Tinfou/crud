<?php 
    require('db_connect.php');
    require('functions.php');

?>
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
    <p><button type="submit">Ajouter</button></p>
</form>

<p><a href="index.php">Liste</a></p>

<?php
    if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_FILES['image']) && !empty($_FILES['image'])){
        if(valid_name($_POST['nom'])){
            $nom = $_POST['nom'];
        }
        if(valid_email($_POST['email'])){
            $email = $_POST['email'];
        }
        if(valid_phone($_POST['phone'])){
            $phone = $_POST['phone'];
        }
        if(valid_image($_FILES['image'])){
            $image = $_FILES['image']['name'];
            $dossier_site = 'images/' .$image;
            move_uploaded_file($_FILES['image']['tmp_name'],$dossier_site);
        } else {
            echo "tsy mety o";
        }
         
        
        if(isset($nom) && isset($email) && isset($email) && isset($phone) && isset($image)){    
            $sql = "INSERT INTO `users`(`id_user`, `nom`, `email`, `phone`, `image`) VALUES (null,'$nom','$email','$phone','$image')";
            $results = mysqli_query($connexion,$sql);
            
                
            if($results){
                header("Location: add.php");
                
            }

        }
    }
?>    
</body>
</html>