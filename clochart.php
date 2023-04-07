<?php
  include 'connect.php';
?>
<?php 
  if (isset($_POST['apply']))
  {
      $student_id = $_POST['student-id'];
      $educational_year = $_POST['educational-year'];
      $educational_semester = $_POST['educational-semester'];
      $enrolled_course = $_POST['enrolled-course'];
      $enrolled_section = $_POST['enrolled-section'];
      
      

      $sql ="SELECT sectionID FROM section_t where 
          sectionNum ='$enrolled_section' AND 
              courseID = '$enrolled_course' AND year = '$educational_year' AND
                  semester = '$educational_semester'";
      $res = mysqli_query($con,$sql);
      $row=mysqli_fetch_assoc($res); 
      $sectionID = $row['sectionID'];

      // fetching registration ID from the database 
      $res = mysqli_query($con,"SELECT registrationID FROM registration_t WHERE
          sectionID ='$sectionID' AND studentID ='$student_id'");
      $row = mysqli_fetch_assoc($res);
      $registrationID = $row['registrationID'];

      // fetchin coID from the database using registrationID from the co_t
      $res = mysqli_query($con,"SELECT coID FROM co_t
          WHERE registrationId='$registrationID'"); 
      $row = mysqli_fetch_assoc($res);
      $coID = $row['coID'];

      // fetching clo1 from the database for the specefic student
      $res = mysqli_query($con,"SELECT clo1 FROM clo_cal_t
          WHERE coID='$coID' AND sectionID='$sectionID' AND
                studentID ='$student_id' "); 
      $row = mysqli_fetch_assoc($res);
      $clo1 = $row['clo1'];

      // fetching clo2 from the database for the specefic student
      $res = mysqli_query($con,"SELECT clo2 FROM clo_cal_t
          WHERE coID='$coID' AND sectionID='$sectionID' AND
                studentID ='$student_id' "); 
      $row = mysqli_fetch_assoc($res);
      $co2 = $row['clo2'];

      // fetching co3 from the database for the specefic student
      $res = mysqli_query($con,"SELECT clo3 FROM clo_cal_t
          WHERE coID='$coID' AND sectionID='$sectionID' AND
                studentID ='$student_id' "); 
      $row = mysqli_fetch_assoc($res);
      $clo3 = $row['clo3'];
        // $res = mysqli_query($con ,"SELECT clo1,clo2,clo3,clo4 
        //      FROM clo_cal_t WHERE coID='$coID' AND 
        //        sectionID='$sectionID' AND
        //        studentID='$student_id'");
        
     


      
      
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie chart</title>
    <link rel="stylesheet" href="style.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data =<?php echo $clo1 ?>;
        
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
           ['clo1',data],
          ['clo2',data],
          ['clo3',data],
          ['clo4',data]
          
          <?php 
         // echo"['clo1','".$clo1."'],";
        //   echo"['clo2','".$clo2."'],";
        //   echo"['.clo3.','".$clo3."'],";
        //   echo"['.clo4.','".$clo4."'],";
         
          ?>
        ]);

        var options = {
          title: 'CLO DISPLAY'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

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
   <center>
   <div class="piechart" id="piechart" style="width: 900px; height: 500px;"></div>   
   </center>
   
</body>
</html>