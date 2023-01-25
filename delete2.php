<?php 
include("./includes/connection.php");
include("./includes/sessions.php"); 
$id="";

if (isset($_GET["id"]))
{
    $id = $_GET["id"];
    $query = "DELETE from programs where id ='$id'";
    $result = mysqli_query($con,$query);
}
header("Location: ./programs.php") ;
exit; 



?>