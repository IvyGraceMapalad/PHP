<?php

if($_SESSION['auth_role'] !="2")
    {
        $_SESSION['status'] = "You are not authorized as SUPER ADMIN for this page!";
        header('Location: index.php');
        exit(0);     
    }

?>