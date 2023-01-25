
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style4.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Students</title>
</head>
<body>
<header class="header">
        <a href="">Admin Dashboard</a>
        <div class="logout">
        <a href="./adminHome.php" class="btn btn-primary">Back To Main Dashboard</a>
    </div>
    </header>
    <div class="container my-5">
        <h2> List of Programs</h2>
        <a class="btn btn-primary" href="./create2.php" role="button">New Program</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Program Name</th>
                    <th>Program ID </th>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            <?php 
                  session_start(); 
                  include("./includes/connection.php");
                  include("./includes/sessions.php"); 

                   $query = "select * from programs";
                   $result = mysqli_query($con,$query );

                   while ($row=mysqli_fetch_assoc($result))
                   {
                    echo " 
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[ProgramName]</td>
                    <td>$row[program_id]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='./edit2.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='./delete2.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                   }

      
       
             ?>
                
            </tbody>
        </table>

    </div>
    
</body>
</html>