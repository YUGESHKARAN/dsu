<?php 

include('../config/constants.php') ;

if(isset($_POST['formData']))
{
   $formData = $_POST['formData'];
   

   foreach ($formData as $data) {
    $sem = $data['sem'];
    $sec = $data['sec'];
    $student_name = $data['name'];
    $faculty_name = $data['faculty_name'];
    $roll_no  = $data['roll_no'];
    $day = $data['dy'];
    $date = $data['dt'];
    $hour = $data['hr'];
    $subject_name = $data['subject'];
    $department = $data['department'];
    $status = $data['atd-status'];

    $sql = "INSERT INTO attendance_tbl_$sem SET
    roll_no  = $roll_no,
    student_name = '$student_name',
    semester = '$sem',
    department = '$department',
    section = '$sec',
    date = '$date',
    day= '$day',
    hour=$hour,
    subject_name='$subject_name',
    attendance_status = '$status',
    faculty_marked = '$faculty_name'
    ";

    $res = mysqli_query($conn,$sql);
    if($res)
    {
        $_SESSION['attendance-marked'] = "<div style='color:green;text-align:center;font-size:20px'>Attendance marked successfully</div>";
        header("location:".SITEURL."frontend/faculty.php");
    }
    else{
        $_SESSION['attendance-marked'] = "<div style='color:red;text-align:center;font-size:20px'>Unable to mark the attendance</div>";
        header("location:".SITEURL."frontend/faculty.php");
    }
   }
}
?>