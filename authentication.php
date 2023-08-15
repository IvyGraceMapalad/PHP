<?php
session_start();
include ('config/dbcon.php');

if(!isset($_SESSION['auth']))
{
    $_SESSION['status'] = "Login To Access this Page.";
    header('Location: ../index.php');
    exit(0);

}else
{
    if($_SESSION['auth_role'] !="1" && $_SESSION['auth_role'] !="2")
    {
        $_SESSION['status'] = "You are not authorized as ADMIN";
        header('Location: ../_index.php');
        exit(0);     
    }

}

?>