<?php 
include("./includes/connection.php");

if (!empty($_POST["program_id"])){

    $query = "select * from programs where program_id = '".$_POST["program_id"]."'order by ProgramName";
    $results = runQuery($con,$query);
    ?>

   
    <?php 


    foreach($results as $res){?>
    <option ><?php echo $res["name"]; ?></option>
    <?php 

    }

}

?>