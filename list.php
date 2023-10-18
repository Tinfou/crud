<?php
    include('db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de Naissance</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php
        $sql = "select * from users";
        $results = mysqli_query($connection,$sql);
        while($result = mysqli_fetch_assoc($results)){
    ?>      
    <tr>
        <td><?php echo $result['id_user']?></td>
        <td><?php echo $result['nom']?></td>
        <td><?php echo $result['prenom']?></td>
        <td><?php echo $result['date_naissance']?></td>
        <td><?php echo $result['email']?></td>
        <td><button type="submit">Modifier</button> <button type ="submit">Supprimer</button></td>
    </tr>
    <?php
        }
    ?>
</table>
    
</body>
</html>