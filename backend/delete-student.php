<?php include('../config/constants.php');


if(isset($_GET['id']) AND isset($_GET['image_name']) AND isset($_GET['name']) AND isset($_GET['sem']) AND isset($_GET['rno']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    $sem = $_GET['sem'];
    $na= $_GET['name'];
    $rno = $_GET['rno'];


    if($image_name != "")
    {
        $path = "../images/student/".$image_name;
        $remove = unlink($path);
        

        if($remove== FALSE)
        {
            $_SESSION['remove'] = "<div class='fail'>Fail to remove image.</div>" ;
            header("location:".SITEURL."backend/students.php");
            die();
        }

        $sql = "DELETE  FROM students WHERE s_no=$id ";
        $sql2 = "DELETE FROM attendance_tbl_$sem WHERE semester='$sem' AND student_name='$na' AND roll_no = $rno ";
        


        $res = mysqli_query($conn,$sql);
        $res2  = mysqli_query($conn,$sql2);

        if($res==TRUE)
        {
            $_SESSION['delete'] = "<div class='success' style='color:green;font-size:20px;text-align:center;'>Student detail deleted successfully!</div>";
            header("location:".SITEURL."backend/students.php");
        }
        else{
            $_SESSION['delete'] = "<div class='fail' style='color:red;font-size:20px;text-align:center;'>SFailed to delete student detail.</div>";
            header("location:".SITEURL."backend/students.php");
        }
        }




 }


?>