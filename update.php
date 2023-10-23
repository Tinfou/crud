<?php 
    require('db_connect.php');
    require('functions.php');  
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            if(isset($_GET['id_user'])){
                $id = $_GET['id_user'];
                $sql = "SELECT * FROM users where id_user = '$id' ";
                $execute_query = mysqli_query($connexion, $sql);
                $result = mysqli_fetch_assoc($execute_query);
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <p><input type="text" name="nom" value= "<?php echo $result['nom'] ?>"></p>
            <p><input type="text" name="phone" value= "<?php echo $result['phone'] ?>"></p>
            <p><input type="email" name="email"  value= "<?php echo $result['email'] ?>"></p>
            <p><img src="images/<?php echo $result['image']; ?>" style="width: 60px; height: 60px;"><input type="file" name="image"></p>
            <p><button type="submit" name ="submit">Modifier</button></p>
        </form> 
    <p><a href="index.php">Liste</a></p>
    </body>
</html>

<?php   
    if(isset($_POST['nom']) &&!empty($_POST['nom']) && isset($_POST['email']) && !empty($_POST['email'])&& isset($_POST['phone']) && !empty($_POST['phone'])){
        if(isset($_POST['submit'])){
            if(valid_name($_POST['nom'])){
                $nom = $_POST['nom'];
            }
            if(valid_email($_POST['email'])){
                $email = $_POST['email'];
            }
            if(valid_phone($_POST['phone'])){    
                $phone = $_POST['phone'];
            }
            $default_image = $result['image'];
            if($default_image){
                $image = $default_image;
            }
            elseif(valid_image($_FILES['image'])){
                $image = $_FILES['image']['name'];
            }
            $dossier_site = 'images/' .$image;
            move_uploaded_file($_FILES['image']['tmp_name'],$dossier_site);  
            $sql =" UPDATE `users` SET `nom`='$nom',`email`='$email',`phone`='$phone',`image`='$image' WHERE id_user = '$id' ";
            $execute_query = mysqli_query($connexion,$sql);
            if($execute_query){
                header("Location: index.php");
            }
        }
    }
?> 