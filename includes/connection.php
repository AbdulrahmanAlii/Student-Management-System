<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "newProject_db";


if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed to connect");
}

function runQuery($con, $query){
    $result = mysqli_query($con,$query );
    while ($row=mysqli_fetch_assoc($result)){
        $resultset[] = $row;
    }

    if(!empty($resultset))
    {
        return $resultset;
    }
}


function numRows($con,$query){
    $result = mysqli_query($con,$query );
    $rowCount = mysqli_num_rows($result);
    return $rowCount;

}

?>