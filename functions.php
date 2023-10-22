<?php

    declare(strict_types=1);

    require('db_connect.php');

    function valid_name($name): bool
    {
        if(preg_match('/^[A-Za-zÀ-ÿ]+(?: [A-Za-zÀ-ÿ]+)*$/', $name)){
            return true;
        }
        else{
            return false;
        }

    }

    function valid_email($email): bool
    {
        if(preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)){
            return true;
        }
        else{
            return false;
        }
    }
    function valid_phone($phone): bool
    {
        if(preg_match('/^03[2348][0-9]{7}$/', $phone)){
            return true;
        }
        else{
            return false;
        }
    }

?>