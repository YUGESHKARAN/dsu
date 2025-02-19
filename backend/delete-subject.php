<?php
include('../config/constants.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM subject_tbl WHERE id=$id";

    $res = mysqli_query($conn,$sql);
    if($res==TRUE)
    {

        $_SESSION['delete'] = "<div class='success' style='color:green;text-align:center;font-size:20px;'>Subject deleted successfully!</div>";
        header("location:".SITEURL."backend/subject.php");
    }
    else{
        $_SESSION['delete'] = "<div class='fail' style='color:red;text-align:center;font-size:20px;'>Unable to delete subject</div>";
        header("location:".SITEURL."backend/subject.php");
    }
}

?>