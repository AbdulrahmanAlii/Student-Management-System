<?php
session_start(); 
include 'includes/sessions.php';
if (isset($_SESSION["userId"]))
{
    unset($_SESSION["userId"]);
}                         
header('Location: adminLogin.php');   
die;   
?>