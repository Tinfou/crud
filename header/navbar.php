
<?php 
require('db_connect.php');
?> 
<?php
    $id = $_SESSION['user_logged']['id_user'];
    $sql = "SELECT * FROM users where id_user = $id ";
    $execute_query = mysqli_query($connexion, $sql);
    $result = mysqli_fetch_array($execute_query);
?>   
<div class="card-header">
    <nav class ="container">
        <ul class="nav justify-content-end">
        <img class="rounded me-auto" src="images/<?php echo $result['image']; ?>" style="width: 40px; height: 40px;">
            <li class="nav-item"><a class="nav-link " href="add.php">Ajouter des utilisateurs</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php">Listes des utilisateurs</a></li>
            <li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </nav>
</div>