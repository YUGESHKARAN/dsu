<?php include('../config/constants.php');


$id =$_GET['id'];



$sql="DELETE FROM admin WHERE id=$id";

$res = mysqli_query($conn,$sql);


if($res== TRUE)
{
    $_SESSION['delete']  = "<div class='success' style='color:green;text-align:center;font-size:20px;'>Student details deleted successfully!</div>";
    header("location:".SITEURL."backend/admin.php");

}
else{
    $_SESSION['delete'] = "<div class='fail' style='color:red;text-align:center; fpont-size:20px;'>Unable to delete admin.</div>";
    header("location:".SITEURL."backend/admin.php");
}


?>

