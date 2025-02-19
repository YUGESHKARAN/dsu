<?php
include('../config/constants.php');

if(isset($_GET['sec']) AND isset($_GET['dept']))
{
    $sec =$_GET['sec'];
    $dept=$_GET['dept'];

    $sql = "DELETE FROM time_table WHERE section='$sec' AND department = '$dept'";
    $res = mysqli_query($conn,$sql);
    if($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='success' style='color:green;text-align:center;fontsize:20px'>Section $sec Time Table deleted successfuly!</div>";
        header("location:".SITEURL."backend/time-table.php");
    }
    else{
        $_SESSION['delete'] = "<div class='fail' style='color:red;text-align:center;fontsize:20px'>Unable to delete section $sec Time Table</div>";
        header("location:".SITEURL."backend/time-table.php");
    }
}