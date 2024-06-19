<?php include('./partials/front.php');
?>
<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM faculty_tbl WHERE id = $id";

    $res = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($res);
    $name = $row['faculty_name'];
    $email = $row['email'];
    $current_image = $row['photo'];
    $subject_id =$row['sub_id'];
    $dept = $row['department'];
    $sem = $row['semester'];
    $section = $row['section'];
}

?>
<?php 

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $department =$_POST['department'];
        $sub_id = $_POST['sub_id'];
        $semester = $_POST['semester'];
        $section = $_POST['section'];


        if(isset($_FILES['image']['name']))
        {
            //GET the image details
            $image_name = $_FILES['image']['name'] ;
    
            //A.check the image is availble or not
            if($image_name !="")
            {
              // Image availabe and replace the new image with current image
    
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
                      $_SESSION['upload'] = "<div class='fail'> Failed to Upload Image</div>"  ;
    
                      header("location:".SITEURL.'backend/faculty.php');
    
                      // Stop the process
                      die();
                    }
    
                    // B.Remove current image if only available
                    if($current_image != "")
                    {
                        $remove_path  = "../images/faculty/".$current_image;
    
                        $remove = unlink($remove_path);
    
                        //check the image removed or not
                        //if failed to remove display Message and stop process
                        if($remove === false)
                        {
                            $_SESSION['failed-remove'] = "<div class='fail'>Failed to remove Image</div>";
                            header("location:".SITEURL.'backend/faculty.php');
                            die();//stop the pocess
                        }
                    }
                    else
                        {
                        // image will be current image
                         $image_name = $image_name;
                        }
                                
    
            }
            else
            {
             // image will be current image
             $image_name = $current_image ;
            }
        }
        else
        {
          $image_name = $current_image ;
        }

        $sql = "UPDATE faculty_tbl SET
        faculty_name = '$name',
        email = '$email',
        photo = '$image_name',
        sub_id = '$sub_id',
        department ='$department',
        semester = '$semester',
        section = '$section'  
        WHERE id=$id";

        $res = mysqli_query($conn,$sql);
        if($res==TRUE)
        {
            $_SESSION['update'] = "<div class='success' style='color:green;text-align:center;font-size;20px'> Faculty details updated successfully!</div>";
            header("location:".SITEURL."backend/faculty.php");
        }
        else{
            $_SESSION['update'] = "<div class='fail' style='color:red;text-align:center;font-size;20px'>Failed to update faculty details</div>";
            header("location:".SITEURL."backend/faculty.php");
        }
    }
   

?>


<div class="adcontainer">
    <h1 style="color:#2980b9">UPDATE FACULTY DETAILS</h1>
</div>

<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="std-add-tbl">
        <tr>
            <td>CURRENT IMAGE </td>

            <td>
            <?php
            if($current_image!="")
            {
                ?>
                 <img src="<?php echo SITEURL;?>images/faculty/<?php echo $current_image;?>" style="margin-left:20px;" width="100px">
                <?php
            }
            else{
               
                echo "<div class='fail'>Image Not Found</div>";
            }
            
            ?>
            </td>
        </tr>
        <tr>
            <td>FACULTY NAME</td>
            <td>
                : <input type="text" name="name" value="<?php echo $name;?>" required>
            </td>
         </tr>

         <tr>
            <td>EMAIL</td>
            <td>
              : <input type="email" name="email" value="<?php echo $email;?> " required>
            </td>
         </tr>

         <tr>
            <td>PHOTO</td>
            <td>
              : <input type="file" name="image" >  
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
                            <option <?php if($dept==$department){echo "selected";}?> value="<?php echo $department;?>"><?php echo $department?></option>
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
                  $sql3 = "SELECT DISTINCT sub_id FROM subject_tbl ";
                  $res3 = mysqli_query($conn,$sql3);
                  $count = mysqli_num_rows($res3);
                  if($count>0)
                  {
                    while($row=mysqli_fetch_assoc($res3))
                    {
                       
                        $sub_id = $row['sub_id'];
                        ?>
                        <option <?php if( $subject_id==$sub_id){ echo "selected";}?> value="<?php echo $sub_id;?>"><?php echo $sub_id;?></option>
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
         <tr>
        <td>SEMESTER</td>
        <td>
            : <select name="semester" required>
                <option <?php if($sem=="I")   {echo "selected";}?> value="I">I</option>
                <option <?php if($sem=="II")  {echo "selected";}?> value="II">II</option>
                <option <?php if($sem=="III") {echo "selected";}?>    value="III">III</option>
                <option <?php if($sem=="IV")  {echo "selected";}?>  value="IV">IV</option>
                <option <?php if($sem=="V")   {echo "selected";}?>  value="V">V</option>
                <option <?php if($sem=="VI")  {echo "selected";}?>  value="VI">VI</option>
                <option <?php if($sem=="VII") {echo "selected";}?>   value="VII">VII</option>
                <option <?php if($sem=="VIII"){echo "selected";}?>    value="VIII">VIII</option>
              </select>
        </td>
      </tr>

      <tr>
            <td>SECTION</td>
            <td>
               : <select name="section" >
                    <option <?php if($section=="A"){ echo "selected";}?> value="A">A</option>
                    <option <?php if($section=="B"){ echo "selected";}?> value="B">B</option>
                    <option <?php if($section=="C"){ echo "selected";}?> value="C">C</option>
                    <option <?php if($section=="D"){ echo "selected";}?> value="D">D</option>
                    <option <?php if($section=="E"){ echo "selected";}?> value="E">E</option>
                    <option <?php if($section=="F"){ echo "selected";}?> value="F">F</option>
                    <option <?php if($section=="G"){ echo "selected";}?> value="G">G</option>
                    <option <?php if($section=="H"){ echo "selected";}?> value="H">H</option>
                    <option <?php if($section=="I"){ echo "selected";}?> value="I">I</option>
                    <option <?php if($section=="J"){ echo "selected";}?> value="J">J</option>
                    <option <?php if($section=="K"){ echo "selected";}?> value="K">K</option>
                    <option <?php if($section=="L"){ echo "selected";}?> value="L">L</option>
                </select>
            </td>
        </tr>

        <tr>
            <td clspan="2" class="submit">
                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" class="btn-update" value="Update Details" >
            </td>
        </tr>

        
      </table>

    </form>
</div>    
