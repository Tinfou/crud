<?php
include('db_connect.php');
if(isset($_GET['id_user'])){
        $id =$_GET['id_user'];
        $sql = "DELETE FROM `users` WHERE id_user = $id ";
        $result = mysqli_query($connection, $sql);
        if($result){
            header("Location: index.php");
        }
        else{
            echo "tys mety" . mysqli_error($connection);
        }
}

?>

