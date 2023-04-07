<?php

$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    include 'connect.php';
     
    $userType=$_POST['userType'];
    $ID=$_POST['ID'];
    $password=$_POST['password'];

  if($userType!='student'){
    $sql="SELECT * from employee_t where employeeID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

  elseif($userType=='student'){
    $sql="SELECT * from student_t where studentID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

        else{
            $invalid=1;
        }
  }
  ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Login page</title>

    <style>
      body{
       
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size:32% 48%;
        background-position:top;
        background-color:darkslategray;
      }

      .mainContainer{
        
        margin-top:3%;
        width:30%;
      }

      .ID{
        font-family: Arial, Helvetica, sans-serif;
        font-size:20px;
        background:darkgray;
        color: #fff;
        margin-left:15px;
        margin-bottom:16px;
        border-radius:8px;
        border:none;
      }

      .ID:hover{
    background:linear-gradient(90deg,#87CEFA,#00BFFF);
   }

   .ID:active{
    opacity: 0.5;
   }

      label{
        
        font-family: Arial, Helvetica, sans-serif;
        font-size:20px;
        color:black;
        font-weight:bolder;
        
      }

  .submitButton{
     height: 46px;
     width: 200px;
     display:inline-block;
     border-radius: 10px;
     border: none;
     outline: none;
     background:darkgray;
     color: #fff;
     font-size: 22px;
     letter-spacing:2px;
     text-transform: uppercase;
     cursor:pointer;
     font-weight: lighter;
     margin-left:30%;
     font-family: Arial, Helvetica, sans-serif;
     margin-top:15px;

    }

    .submitButton:hover{
    background:linear-gradient(90deg,#87CEFA,#00BFFF);
   }

   .submitButton:active{
    opacity: 0.5;
   }
   .img{
     
     display:block;
     margin-left:auto;
     margin-right:auto;
     width:80%;
    
     
   }
   .form{
     margin-bottom:50%;
   }
   .footer{
    
        position: fixed;
        padding: 10px 10px 0px 10px;
        bottom: 2px;
        width: 100%;
        /* Height of the footer*/
        height: 40px;
        background:fixed;
        text-align: center;
        
   }

   .selectNew{
     height: 46px;
     width: 200px;
     display:inline-block;
     border-radius: 8px;
     border: none;
     outline: none;
     background-color: darkgray;
     color: #fff;
     font-size: 16px;
     letter-spacing:2px;
     text-transform: uppercase;
     cursor:pointer;
     font-weight:lighter;
     margin-left:30%;
     font-family: Arial, Helvetica, sans-serif;
     

   }

    </style>


  </head>
  <body>

 <?php
 if($invalid==1){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> Invalid credentials!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>
  
  <img class="img" src="iubbackground.jpeg">

  
  

  <div style="display:flex;justify-content:center;">
  <div class="mainContainer">
   <form action="login.php" method="post">
  <div class="form">
    
    <div>
    <select name="userType" class=" selectNew">
             <option disabled selected>User Type</option>
             <option value="student">Student</option>
             <option value="faculty">Faculty</option>
             <option value="department head">Department Head</option>
             <option value="dean">Dean</option>
    </select>
    </div>
    <br>

    
    <input class="ID" style="margin-left:30%;" type="text" name="ID" placeholder="Enter Your ID">
    <br>
    
    <input class="ID" style="margin-left:30%;" type="password" name="password" placeholder="Enter Your Password"><br>
    <input type="submit" name="submit" value="Login" class="submitButton">
    </form>
  </div>
  </div>


</body>
<footer class ="footer">
  <div>
    <h3>Student Performance Monitoring System</h3>
  </div>
</footer>
</html> 