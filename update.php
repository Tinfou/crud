<?php include('db_connect.php');
$id = $_GET['id_user'];
?>

<?php
   if(isset($_POST['submit'])){ 
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $image = $_FILES['image']['name'];
        $dossier_site = 'images/' .$image;
        move_uploaded_file($_FILES['image']['tmp_name'],$dossier_site); 
        $sql =" UPDATE `users` SET `nom`='$nom',`email`='$email',`phone`='$phone',`image`='$image' WHERE id_user = $id ";
        $results = mysqli_query($connection,$sql);
        if($results){
            header("Location:index.php");
        }
}

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
    $sql = "SELECT * FROM users where id_user = $id ";
    $results = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($results);
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <p><input type="text" name="nom" value= "<?php echo $result['nom'] ?>"></p>
    <p><input type="text" name="phone" value= "<?php echo $result['phone'] ?>"></p>
    <p><input type="email" name="email"  value= "<?php echo $result['email'] ?>"></p>
    <p><img src="images/<?php echo $result['image']; ?>" style="width: 60px; height: 60px;"></p>
    <p><input type="file" name="image"></p>
    
    <p><button type="submit" name="submit">Modifier</button></p>
</form>

<p><a href="index.php">Liste</a></p>



</body>
</html>