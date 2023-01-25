<?php

session_start(); 
include("../includes/sessions.php");
include("../includes/connection.php");

 $ffname = "";
 $llname = "";
 $password = "";
 $emailAddress1 = "";
 $llname = "";
 $ErrMsg1="";
 $ErrMsg2="";
 $ErrMsg3="";
 $ErrMsg4="";
 $lang="";
 $camp="";
 $prog1="";
 $selectOption = "";
if($_POST!=null)
{

    $ffname = $_POST ["fName"]; 
    $llname = $_POST ["lName"]; 
    $password = $_POST ["password"]; 
    $emailAddress1 = $_POST ["email"]; 
    $dateOF = $_POST ["dOfBirth"];
    $lang = $_POST ["language"];
    $camp = $_POST ["campus"];
    $prog1 = $_POST ["programm"];
    if ($prog1 == 1) {
        $prog1 = "AEC";
        
    } else if ($prog1 == 2) {
        $prog1 = "DEP";
        
    } else if ($prog1 == 3) {
        $prog1 = "DEC";  
        
    } else if ($prog1 == 4)  {
        $prog1 = "ASP"; 
       
    }
    $selectOption = $_POST['taskOption'];
    

    

    

    function is_Valid1(string $name){
     if (
     mb_strlen($name) <= 15
     and preg_match('/^[A-Z][a-z]*/', $name)
      ) {
        return true; // Passed all checks
      }
      
      
       return false; 
       $name = "";
    }
    function is_Valid2(string $name){
        if (
        mb_strlen($name) <= 20
        and preg_match('/^[A-Z][a-z]*/', $name)
         ) {
           return true; // Passed all checks
         }
         
         
          return false; 
          
       }
    function is_Valid3(string $name){
        if (
        preg_match('/^(0?[1-9]|[12][0-9]|3[01])[\\-](0?[1-9]|1[012])[\\-]\d{4}$/', $name)
         ) {
           return true; // Passed all checks
         }
         
         
          return false; 
          
       }
   
   $ErrMsg1 = is_Valid1($ffname)? '' : 'must start with an upper-case letter and has a maximum of 15 characters'.$ffname="";
   $ErrMsg2 = is_Valid2($llname)? '' : 'must start with an upper-case letter and has a maximum of 20 characters'.$llname="";
   $ErrMsg3 = is_Valid3($dateOF)? '' : 'Pleease Follow the write format'.$dateOF="";

   if (is_Valid1($ffname) && is_Valid2($llname) && is_Valid3($dateOF))
   {
       $studentName = $ffname." ".$llname;
       $userId = random_num(20);


       $query = "insert into students (userId, studentName, password, studentEmail) values ('$userId', '$studentName', '$password', '$emailAddress1')";
        mysqli_query($con, $query);
       header("Location: ../Login.php") ;
    

   }
   else 
   {
    header( "refresh:3;url=index.php" );    
   }


   
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Admission</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="index.js"></script>
</head>

<body>
    <div class="container">
        <div class="title">Admission Application</div>
        <div class="content">
            <form  id="myForm" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" placeholder="Enter your First name" required name="fName">
                        <span class="error"><?php echo $ErrMsg1 ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" placeholder="Enter your Last name" required name="lName">
                        <span class="error"><?php echo $ErrMsg2 ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Date Of Birth</span>
                        <input type="text" required name="dOfBirth" placeholder="dd-mm-yyyy">
                        <span class="error"><?php echo $ErrMsg3 ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" required name="password">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" required name="email">
                        <span class="error"><?php echo $ErrMsg4 ?></span>
                    </div>
                </div>
                <div class="campus-details">
                    <input type="radio" name="language" id="dot-7" class="lang" value="English">
                    <input type="radio" name="language" id="dot-8" class="lang" value="french">
                    <span class="campus-title">Please Choose the Language : </span>
                    <div class="category">
                        <label for="dot-7">
          <span class="dot seven"></span>
          <span class="campus">English</span>
        </label>
                        <label for="dot-8">
          <span class="dot eight"></span>
          <span class="campus">French</span>
        </label>
                    </div>
                </div>
                <div class="campus-details">
                    <input type="radio" name="campus" id="dot-1" class="location" value="Montreal">
                    <input type="radio" name="campus" id="dot-2" class="location" value="Laval">
                    <span class="campus-title">Please Choose the Campus : </span>
                    <div class="category">
                        <label for="dot-1">
            <span class="dot one"></span>
            <span class="campus">Montreal</span>
          </label>
                        <label for="dot-2">
            <span class="dot two"></span>
            <span class="campus">Laval</span>
          </label>
                    </div>
                </div>
                <div class="campus-details">
                    <input type="radio" name="programm" id="dot-3" class="type" value="1">
                    <input type="radio" name="programm" id="dot-4" class="type" value="2">
                    <input type="radio" name="programm" id="dot-5" class="type" value="3">
                    <input type="radio" name="programm" id="dot-6" class="type" value="4">
                    <span class="campus-title">Please Choose Programm Type : </span>
                    <div class="category">
                        <label for="dot-3">
          <span class="dot three"></span>
          <span class="campus">AEC</span>
        </label>
                        <label for="dot-4">
          <span class="dot four"></span>
          <span class="campus">DEP</span>
        </label>
                        <label for="dot-5">
          <span class="dot five"></span>
          <span class="campus">DEC</span>
        </label>
                        <label for="dot-6">
          <span class="dot six"></span>
          <span class="campus">ASP</span>
        </label>
                    </div>
                </div>
                <div class="input-box">
                    <span class="campus-title">Please Choose  programm : </span>
                    <select id="proOptions" name="taskOption">
                      <option ></option>
                      <option id="n1"></option>
                      <option id="n2"></option>
                      <option id="n3"></option>
                      <option id="n4"></option>
                    </select>
                </div>
                <div class="button">
                    <input type="submit" value="Register">
                </div>
                <div class="button">
                    <input type="reset" value="Clear">
                </div>
            </form>
        </div>
    </div>
    <!-- <h1> <?php echo $prog1  ?> </h1> -->
    <!-- <h1> <?php echo $llname ?> </h1> -->
    
    


</body>

</html>