<?php

    declare(strict_types=1);

    include('db_connect.php');

    function getlist($connection)
    {
        $sql = "select * from users";
        $result = mysqli_query($connection,$sql);
        while($results = mysqli_fetch_assoc($result)){
            echo $results['nom'];
        }

    }
?>