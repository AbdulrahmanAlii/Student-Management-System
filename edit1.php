<?php 
include("./includes/connection.php");
include("./includes/sessions.php"); 
$id="";
$name = "";
$email = "";
$password1 ="";
$userid="";
$errorMassage="";
$successMassage="";

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (!isset($_GET["id"]))
    {
        header("Location: ./Students.php") ;
        exit;
    }
    $id = $_GET["id"];
    $query = "SELECT * from students where id ='$id'";
    $result = mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);

    if (!$row){
        header("Location: ./Students.php") ;
        exit; 
    }

    $name = $row["studentName"];
    $email = $row["studentEmail"];
    $password1 =$row["password"];
    $userid= $row["userId"];
}
else 
{
    $id = $_GET["id"];
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $userid= $row["userId"];

    do {
        if (empty($name) || empty($email))
        {
            $errorMassage="All the field are required";
            break;
        }

        $query = "UPDATE students set studentName = '$name', studentEmail='$email' where id ='$id'";
        $result = mysqli_query($con,$query );
        if(!$result)
        {
            $errorMassage="Invalid Query". mysqli_error($con);
            break;
        }
        $successMassage="Student updated successfully";
        header("Location: ./Students.php") ;
        exit; 


    }while(true);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Students</title>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Student</h2>
        <?php 
        if (!empty($errorMassage))
        {
        echo"
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMassage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
        </div>
        ";
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="Name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="Email" value="<?php echo $email; ?>">
                </div>
            </div>
            <?php 
        if (!empty($successMassage))
        {
        echo"
        <div class='row mb-3'>
        <div class='offset-sm-3 col-sm-6'>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>$successMassage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
        </div>
        </div>
        </div>
        ";
        }
        ?>
            <div class="row mb-3">
               <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
               </div>
               <div class="col-sm-3 d-grid">
                <a href="./Students.php" class="btn btn-outline-primary" role="button">Cancel</a>
               </div>
            </div>

        </form>

    </div>
</body>
</html>