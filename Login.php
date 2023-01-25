<?php
$error ="";
session_start(); 

include './includes/sessions.php';
include("./includes/connection.php");

// $user_data = check_login($con);

// if ($logged_in) {                              
//     header('Location: Home.php');           
//     exit;                                      
// }    

if($_SERVER['REQUEST_METHOD'] == 'POST') {     
    $user_email    = $_POST['email'];          
    $user_password = $_POST['password'];       

    if (!empty($user_email) && !empty($user_password)) { 
        $query = "select * from students where studentEmail = '$user_email' limit 1";  
        $result = mysqli_query($con, $query); 
        if ($result)
        {
          if($result && mysqli_num_rows($result)>0)
            {
               $user_data = mysqli_fetch_assoc($result);
               if ($user_data["password"] === $user_password)
               {
                $_SESSION["userId"] = $user_data["userId"];
                header('Location: Home.php'); 
                die;        
               }
            }
        }      
        header( "refresh:3;url=Login.php" );                 
        $error = "Wrong user name or password";                             
    }
    else
    {
        header( "refresh:3;url=Login.php" ); 
        $error = "Wrong user name or password"; 
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>Login Page</title>
</head>

<body>

<div class="header">
        <a href="#default" class="logo"><img src="./media/B.png" alt=""></a>
        <div class="header-right">
          <a class="active" href="#home">Home</a>
          <a href="./PHP-PROJECT/index.php">Sign Up</a>
        </div>
      </div>
    
    <form action="" method="POST">
        <h3>Welcom To Student Account</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username" name="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">
        <span><?php echo $error ?></span>

        <button>Log In</button>

    </form>
   
   
</body>

</html>