<?php 
include("./includes/connection.php");
include("./includes/sessions.php"); 
$id="";

if (isset($_GET["id"]))
{
    $id = $_GET["id"];
    $query = "DELETE from students where id ='$id'";
    $result = mysqli_query($con,$query);
}
header("Location: ./Students.php") ;
exit; 



?>