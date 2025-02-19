<?php include('./partials/front.php');
?>
<body>
<div class="adcontainer">
    <h1>DSU ADMIN PANNEL</h1>
</div>
<?php 
 $id = $_GET['id'];
 $sql ="SELECT * FROM admin WHERE id=$id";
 $res =  mysqli_query($conn,$sql);

 if($res==TRUE)
 {
    $count = mysqli_num_rows($res);
    if($count ==1)
    {
        $row=mysqli_fetch_assoc($res);
        $name = $row['user_name'];
        $email = $row['email'];
    }

    else{
        header("location:".SITEURL."backend/admin.php");
    }
 }
?>

<?php
if(isset($_POST['submit']))
{

    $id=$_POST['id'];
    $name=$_POST['name'];
    $email = $_POST['email'];


    $sql2 = "UPDATE admin SET
    user_name = '$name',
    email = '$email'
    WHERE id=$id
    ";
    $res =mysqli_query($conn,$sql2);
    if($res==TRUE)
           {
               //Data inserted
               //echo "Admin Updated";

               //create session variable to display message
               $_SESSION['update'] = "<div class='success' style='color:green;text-align:center;fontsizr:20px;'>Admin Updated Successfully</div>";

               //Redirect Page to manage-admin
                  header("location:".SITEURL.'backend/admin.php');
                  exit;
           }
           else
           {
               //Failed to insert data
               //echo "Failed to insert data";

               //create session variable to display message
               $_SESSION['update'] = "<div class='fail' style='color:red;text-align:center;fontsizr:20px;'>Admin Not Updated </div>";

               //Redirect Page to add-admin
               header("location:".SITEURL.'backend/admin.php');
           }


}

?>




<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="std-add-tbl">

      <tr>
        <td>
        ADMIN NAME
        </td>
        <td>
            : <input type="text" name="name" placeholder="<?php echo $name;?>" required>
        </td>
      </tr>
      <tr>
        <td>
            Email ID
        </td>

        <td>
            : <input type="email" name="email" placeholder="<?php echo $email;?>" required>
        </td>
      </tr>

      <tr>
        <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="submit" class="btn-update" >
        </td>
      </tr>
      </table>
    </form>
</div>