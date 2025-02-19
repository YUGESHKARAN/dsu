
<?php include('./partials/front.php');
?>

<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

 
    $sql = "INSERT INTO admin SET
    user_name = '$name',
    password = '$password',
    email = '$email'
    ";


  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $_SESSION['add']= "<div class='success' style='color:green;font-size:20px;text-align:center'>Admin added successfully!</div>";
    header("location:".SITEURL."backend/admin.php");
   
  }

  else{
    $_SESSION['add']= "<div class='fail' style='color:red;font-size:20px;text-align:center'>Failed to add admin!</div>";
    header("location:".SITEURL."backend/admin.php");
  }
}

?>


<div class="adcontainer">
    <h1 >ADD ADMIN DETAILS</h1>
</div>

<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="std-add-tbl">

      <tr>
        <td>
        ADMIN NAME
        </td>
        <td>
            : <input type="text" name="name" required>
        </td>
      </tr>
      <tr>
        <td>
            Email ID
        </td>

        <td>
            : <input type="email" name="email" required>
        </td>
      </tr>

      <tr>
        <td>
            Password
        </td>

        <td>
            : <input type="password" name="password" required>
        </td>
      </tr>

      <tr>
        <td colspan="2">
            <input type="submit" name="submit" value="submit" class="btn-update" >
        </td>
      </tr>
      </table>
    </form>
</div>