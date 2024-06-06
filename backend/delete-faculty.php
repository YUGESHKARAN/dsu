<?php include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    if($image_name != "")
    {
        $path = "../images/faculty/".$image_name;
        $remove = unlink($path);
        

        if($remove == FALSE)
        {
            $_SESSION['remove'] = "<div class='fail'>Fail to remove image.</div>" ;
            header("location:".SITEURL."backend/faculty.php");
            die();
        }

        $sql = "DELETE FROM faculty_tbl WHERE id=$id ";

        $res = mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            $_SESSION['delete'] = "<div class='success' style='color:green;font-size:20px;text-align:center;'>Student detail deleted successfully!</div>";
            header("location:".SITEURL."backend/faculty.php");
        }
        else{
            $_SESSION['delete'] = "<div class='fail' style='color:red;font-size:20px;text-align:center;'>SFailed to delete student detail.</div>";
            header("location:".SITEURL."backend/faculty.php");
        }
        }




 }

?>


