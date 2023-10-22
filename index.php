<?php require('db_connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><a href="add.php">Add new</a></p>

<table>
    <tr>
        <th>photo</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php
        $sql = "select * from users";
        $results = mysqli_query($connexion,$sql);
        while($result = mysqli_fetch_assoc($results)){
    ?>      
    <tr>
        <td><?php echo ('<img style ="width:60px;height:60px " src="images/' .$result['image'] . '"/>')?></td>
        <td><?php echo $result['nom']?></td>
        <td><?php echo $result['email']?></td>
        <td><?php echo $result['phone']?></td>
        <td>
            <a href="info.php?id_user=<?php echo $result['id_user']; ?>">Details</a>
            <a href="delete.php?id_user=<?php echo $result['id_user']; ?>">Supprimer</a>
            <a href="update.php?id_user=<?php echo $result['id_user']; ?>">Modifier</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
    
</body>
</html>