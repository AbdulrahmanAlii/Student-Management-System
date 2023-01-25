<?php

session_start(); 
include "./includes/sessions.php";
include("./includes/connection.php");

$user_data = check_login($con)
// require_login($logged_in); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <title>Student Page</title>
</head>
<body>
    <div class="header">
        <a href="#default" class="logo"><img src="./media/B.png" alt=""></a>
        <div class="header-right">
          <a class="active" href="#home">Home</a>
          <a href="logout.php">Log out</a>
        </div>
      </div>
    <div class="student-profile py-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent text-center">
                  <img class="profile_img" src="./media/C.jpg" alt="student dp">
                  <h3><?php echo $user_data["studentEmail"]?></h3>
                </div>
                <div class="card-body">
                  <p class="mb-0"><strong class="pr-1">Student ID:</strong>321000001</p>
                  <p class="mb-0"><strong class="pr-1">Class:</strong>4</p>
                  <p class="mb-0"><strong class="pr-1">Section:</strong>A</p>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Student Information</h3>
                </div>
                <div class="card-body pt-0">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">Roll</th>
                      <td width="2%">:</td>
                      <td>125</td>
                    </tr>
                    <tr>
                      <th width="30%">Academic Year	</th>
                      <td width="2%">:</td>
                      <td>2020</td>
                    </tr>
                    <tr>
                      <th width="30%">Gender</th>
                      <td width="2%">:</td>
                      <td>Male</td>
                    </tr>
                    <tr>
                      <th width="30%">Email Address</th>
                      <td width="2%">:</td>
                      <td>hhh@LCieducation.net</td>
                    </tr>
                    <tr>
                      <th width="30%">Phone Number</th>
                      <td width="2%">:</td>
                      <td>5145551234</td>
                    </tr>
                  </table>
                </div>
              </div>
                <div style="height: 26px"></div>
              <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Additional Information</h3>
                </div>
                <div class="card-body pt-0">
                    <p>This is a test space for phase 3 of the php project</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
</body>
</html>