<?php
  include 'connect.php';
 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>CLO VIEW INFO</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }
      
      form {
        background-color:burlywood;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        width: 500px;
        margin: 0 auto;
      }
      
      label {
        display: inline-block;
        width: 150px;
        margin-bottom: 10px;
      }
      
      input[type="text"],
      input[type="number"] {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 5px rgba(0,0,0,0.2);
        width: 250px;
        margin-bottom: 20px;
      }
      
      input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
      }
      
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
      
      
      h1 {
        text-align: center;
        font-size: 36px;
        color: #4CAF50;
      }
    </style>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="nav">
        <div class="nav-links">
          <ul>
          <li><a href="employee_dashboard.php" target="_self">Dashboard</a></li>
          <li><a href="CLO.php" target="_self">CLO</a></li>
          <li><a href="logout.php" target="_self">Logout</a></li>
            </ul>
        </div>
    </div>
    <h1>STUDENT INFO FOR VIEW</h1>
    <form action="clochart.php" method="POST">
      <label for="student-id">Student ID:</label>
      <input type="number" id="student-id" name="student-id"><br><br>
      <label for="educational-year">Educational Year:</label>
      <input type="text" id="educational-year" name="educational-year"><br><br>
      <label for="educational-semester">Educational Semester:</label>
      <input type="text" id="educational-semester" name="educational-semester"><br><br>
      <label for="enrolled-course">Enrolled Course:</label>
      <input type="text" id="enrolled-course" name="enrolled-course"><br><br>
      <label for="enrolled-section">Enrolled Section:</label>
      <input type="number" id="enrolled-section" name="enrolled-section"><br><br>
     
      <input type="submit" value="Submit" name ="apply" id="submit">
    </form>
    

    <footer class="footer">
      <p>Student Performance Monitoring System</p>
    </footer>
  </body>
</html>
