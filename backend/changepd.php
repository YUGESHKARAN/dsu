<?php include('./partials/front.php');
?>
<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

if(isset($_SESSION['not-match']))
{
    echo $_SESSION['not-match']; // displaying session message
    unset($_SESSION['not-match']); //removing session message
}
?>




<body>
<div class="adcontainer">
    <h1>DSU ADMIN PANNEL</h1>
</div>





<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="std-add-tbl">

      <tr>
        <td>
        Current Password
        </td>
        <td>
            : <input type="password" name="current_password"  required>
        </td>
      </tr>
      <tr>
            <td>
                New Password
            </td>

            <td>
                : <input type="password" name="new_password"  required>
            </td>
      </tr>

      <tr>
        <td>
            Confirm Password
        </td>

        <td>
            : <input type="password" name="confirm_password"  required>
        </td>
      </tr>

      <tr>
        <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Change Password" class="btn-update" >
        </td>
      </tr>
      </table>
    </form>

    <?php

if(isset($_POST['submit']) AND isset($_POST['id']))
{
    $id = $_POST['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password  = $_POST['confirm_password'];

    $sql = "SELECT * FROM admin WHERE id=$id AND password = '$current_password'";

    $res= mysqli_query($conn,$sql);

    if($res==TRUE)
    {
        $count = mysqli_num_rows($res);
        if($count==1)
        {
           if($new_password == $confirm_password)
           {
               $sql2 = "UPDATE admin SET password='$new_password'
               WHERE id=$id
               ";

               $res2 = mysqli_query($conn,$sql2);
               if($res2==TRUE)
               {
                $_SESSION['change-pwd']= "<div class='success' style='color:green;text-align:center;font-size:20px;''> Password changed successfully!</div>";
                header("location:".SITEURL."backend/admin.php");
                
               }
               else{
                $_SESSION['change-pwd']= "<div class='fail' style='color:red;text-align:center;font-size:20px;''> Unable to change password</div>";
                header("location:".SITEURL."backend/admin.php");
               }
           }
           else{
             
            $_SESSION['not-match'] = "<div style='color:red;text-align:center;font-size:20px;'>New passwor & Confirm password not match</div>";
            header("location:".SITEURL."backend/changepd.php");

           }
        }
        else{
            $_SESSION['user-not-found'] = "<div style='color:red;text-align:center;font-size:20px;'>user not found</div>";
            header("location:".SITEURL."backend/admin.php");
        }
    }

    


}
?>
</div>