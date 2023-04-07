<?php 
  include 'connect.php';
  session_start();
?>
<?php
    
    if (isset($_POST['apply']))
    {
        $student_id = $_POST['student-id'];
        $educational_year = $_POST['educational-year'];
        $educational_semester = $_POST['educational-semester'];
        $enrolled_course = $_POST['enrolled-course'];
        $enrolled_section = $_POST['enrolled-section'];
        $grade = $_POST['grade'];
        
        if ($grade==4){
            $clo1 =90;
            $clo2 =90;
            $clo3=90;
            $clo4 =90;
        }
        else if ($grade ==3.7){
            $clo1 =85;
            $clo2 =85;
            $clo3=85;
            $clo4 =85;

        }
        else if ($grade ==3.3){
            $clo1 =80;
            $clo2 =80;
            $clo3=80;
            $clo4 =80;

        }
        else if ($grade ==3){
            $clo1 =75;
            $clo2 =75;
            $clo3=75;
            $clo4 =75;

        }
        else if ($grade ==2.7){
            $clo1 =70;
            $clo2 =70;
            $clo3=70;
            $clo4 =70;

        }
        else if ($grade ==2.3){
            $clo1 =65;
            $clo2 =65;
            $clo3=65;
            $clo4 =65;

        }
        else if ($grade ==2){
            $clo1 =60;
            $clo2 =60;
            $clo3=60;
            $clo4 =60;

        }
        else if ($grade ==1.7){
            $clo1 =55;
            $clo2 =55;
            $clo3=55;
            $clo4 =55;

        }
        else if ($grade ==1.3){
            $clo1 =50;
            $clo2 =50;
            $clo3=50;
            $clo4 =50;

        }
        else if ($grade ==1){
            $clo1 =45;
            $clo2 =45;
            $clo3=45;
            $clo4 =45;

        }
        else{
            $clo1 =0;
            $clo2=0;
            $clo3 = 0;
            $clo4 = 0;
        }
        //fetching section ID from the database
        $sql ="SELECT sectionID FROM section_t where sectionNum ='$enrolled_section' AND 
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



        $sql="INSERT INTO clo_cal_t(coID,sectionID,studentID,clo1,clo2,clo3,clo4 )
        VALUES ('$coID','$sectionID','$student_id','$clo1','$clo2','$clo3','$clo4')";

        $result = mysqli_query($con,$sql);
        if ($result){
            $_SESSSION['message']="Your data submission is successful";
            header("location:studentcloinfo.php");
          
        }
        else{
            echo "Submission Failed";
        }
    }

?>