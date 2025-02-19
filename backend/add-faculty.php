<?php include('./partials/front.php');?>

<?php

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $sub_id = $_POST['sub_id'];
    $semester = $_POST['semester'];
    $sec = $_POST['section'];


    
    if(isset($_FILES['image']['name']))
    {
      // Upload the image
      //To upload the image we need source path and destination path
      $image_name = $_FILES['image']['name'];

      // Upload the image only if image selected
      if($image_name != "")
      {
          //Auto rename images
          //Get the extension of the image  e.g: "food_image.jpg"

          $parts = explode('.', $image_name);
          $ext = end($parts); // seperate the extension e.g: "jpg"

          $image_name = "profile_".rand(000,999).'.'.$ext; // make a new value for image name e.g: "Food_Category_453.jpg"

          $source_path = $_FILES['image']['tmp_name'];
          
          $destination_path = "../images/faculty/".$image_name;

          // Upload the image
          $upload = move_uploaded_file($source_path,$destination_path);

          //check image upoladed or not
          //if not upload stop the process and redirect with error messsage
          if($upload==false)
          {
            //SET message
            $_SESSION['upload'] = "<div class='fails'> Failed to Upload Image</div>"  ;

            header("location:".SITEURL.'backend/add-faculty.php');

            // Stop the process
            die();
          }
     }
    }
    else{

      //don't upload the image and set the image_name value blank

      $image_name = "";
    }

    $sql = "INSERT INTO faculty_tbl SET
    faculty_name = '$name',
    email = '$email',
    photo = '$image_name',
    sub_id = '$sub_id',
    department = '$department',
    semester = '$semester',
    section = '$sec'
    ";

    $res = mysqli_query($conn,$sql);
    if($res==TRUE)
    {
        $_SESSION['add'] = "<div style='color:green;text-align:center;font-size:20px;'>Faculty details added successfully!</div>";
        header("location:".SITEURL."backend/faculty.php");
    }
    else{
        $_SESSION['add'] = "<div style='color:red;text-align:center;font-size:20px;'>Unable to add faculty details</div>";
        header("location:".SITEURL."backend/add-faculty.php");
    }
}

?>




<div class="adcontainer">
    <h1 style="color:#2980b9">ADD FACULTY DETAILS</h1>
</div>
<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data" >
      <table class="std-add-tbl" >
      
         <tr>
            <td>FACULTY NAME</td>
            <td>
                : <input type="text" name="name" required>
            </td>
         </tr>

         <tr>
            <td>EMAIL</td>
            <td>
              : <input type="email" name="email" required>
            </td>
         </tr>

         <tr>
            <td>PHOTO</td>
            <td>
              : <input type="file" name="image" required>  
            </td>
         </tr>

         <tr>
            <td>DEPARTMENT</td>
            <td>
               : <select name="department" >

                <?php 

                $sql2 = "SELECT DISTINCT department FROM subject_tbl";
                $res2 = mysqli_query($conn,$sql2);
                $count = mysqli_num_rows($res2);
                  if($count>0)
                   {
                        while($row =mysqli_fetch_assoc($res2))
                        {
                           
                            $department = $row['department'];

                            ?>
                            <option value="<?php echo $department;?>"><?php echo $department?></option>
                        <?php
                        
                        }
                    }
                    else{
                        ?>
                            <option value="0">No department available</option>
                        <?php
                    }
                ?>
                   
                  </select>
            </td>
         </tr>

         <tr>
            <td>SUBJECT_ID</td>
            <td>
              : <select name="sub_id" >
                  <?php
                  $sql3 = "SELECT * FROM subject_tbl ";
                  $res3 = mysqli_query($conn,$sql3);
                  $count = mysqli_num_rows($res3);
                  if($count>0)
                  {
                    while($row=mysqli_fetch_assoc($res3))
                    {
                       
                        $sub_id = $row['sub_id'];
                        ?>
                        <option value="<?php echo $sub_id;?>"><?php echo $sub_id;?></option>
                        <?php
                    }
                  }
                  else{
                    ?>
                    <option value="0">No subject Id found</option>
                    <?php
                  }
                  
                  ?>
                </select>
            </td>
         </tr>

         <tr>
        <td>SEMESTER</td>
        <td>
            : <select name="semester" required>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
                <option value="VII">VII</option>
                <option value="VIII">VIII</option>
              </select>
        </td>
      </tr>

      <tr>
            <td>SECTION</td>
            <td>
               : <select name="section" >
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
                </select>
            </td>
        </tr>

        <tr>
            
            <td colspan="2">
          <input type="submit" name="submit" value="Cliak to Add" class="btn-update">
            </td>
        </tr>
      
      </table>
    </form>


</div>
