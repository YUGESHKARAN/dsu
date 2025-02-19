<?php include('./partials/front.php');
?>
<?php

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = " SELECT * FROM students WHERE s_no=$id";

    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    if($count == 1)
    {

        $row = mysqli_fetch_assoc($res) ;  
        
        $name = $row['name'];
        $current_image=$row['photo'];
        $ad_no=$row['admission_no'];
        $roll_no = $row['roll_no'];
        $degeree = $row['degree'];
        $dept = $row['department'];
        $semester = $row['semester'];
        $course  = $row['course_name'];
        $school = $row['school'];
        $status = $row['status'];
        $sec = $row["section"] ;
        $gender = $row['gender'];
        $hrd = $row['hd'];


    }
    else{
        $_SESSION['student-not-found'] = "<div class='fail'>Student Not Found.</div>";
        header("location:".SITEURL."backend/students.php");
    }





    if(isset($_POST['submit']))
    {

        $id=$_POST['id'];
        $status = $_POST['status'];
        $addmission = $_POST['add_no'];
        $roll = $_POST['roll_no'];
        $degree = $_POST['degree'];
        $dept = $_POST['department'];
        $sem = $_POST['semester'];
        $sec = $_POST['section'];
        $school = $_POST['school'];
        $course = $_POST['course']; 
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $hrd = $_POST['hd'];
      


         //check the image is selected or not
    if(isset($_FILES['image1']['name']))
    {
        //GET the image details
        $image_name = $_FILES['image1']['name'] ;
    
        //A.check the image is availble or not
        if($image_name !="")
        {
          // Image availabe and replace the new image with current image

          //Auto rename images
                //Get the extension of the image  e.g: "food_image.jpg"

              $parts = explode('.', $image_name);
              $ext = end($parts); // seperate the extension e.g: "jpg"


                $image_name = "profile_".rand(000,999).'.'.$ext; // make a new value for image name e.g: "Food_Category_453.jpg"

                $source_path = $_FILES['image1']['tmp_name'];
                
                $destination_path = "../images/student/".$image_name;

                // Upload the image
                $upload = move_uploaded_file($source_path,$destination_path);

                //check image upoladed or not
                //if not upload stop the process and redirect with error messsage
                if($upload==false)
                {
                  //SET message
                  $_SESSION['upload'] = "<div class='fail'> Failed to Upload Image</div>"  ;

                  header("location:".SITEURL.'backend/students.php');

                  // Stop the process
                  die();
                }

                // B.Remove current image if only available
                if($current_image !="")
                {
                    $remove_path  = "../images/student/".$current_image;

                    $remove = unlink($remove_path);

                    //check the image removed or not
                    //if failed to remove display Message and stop process
                    if($remove === false)
                    {
                        $_SESSION['failed-remove'] = "<div class='fail' style='text-align:center;color:red;font-size:20px'>Failed to remove Image</div>";
                        header("location:".SITEURL.'backend/students.php');
                        die();//stop the pocess
                    }
                }
                else
                    {
                    // image will be current image
                     $image_name = $image_name ;
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



    $sql2 = "UPDATE students SET
    name = '$name',
     photo = '$image_name',
     admission_no = '$addmission',
     roll_no = $roll,
     degree = '$degree',
     department = '$dept',
     semester = '$sem',
     course_name = '$course',
     school = '$school',
     status = '$status',
     section = '$sec',
     gender = '$gender',
     hd = '$hrd'
     WHERE s_no = $id
     ";

     $res2 = mysqli_query($conn,$sql2);


     if($res2==TRUE){
        $_SESSION['update'] = "<div class='success' style='color:green;font-size:20px;text-align:center;'>Student details updated successfully!</div>"; 
        header("location:".SITEURL."backend/students.php");
     }
     else{
        $_SESSION['update'] = "<div class='fail'>failed to update</div>"; 
        header("location:".SITEURL."backend/students.php");
     }





    }
}

?>






<body>
    
<div class="adcontainer">
    <h1 style="color:#2980b9">UPDATE STUDENT DETAILS</h1>
</div>


<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="std-add-tbl">
      <tr>
        <td>CURRENT IMAGE </td>
                <td>
                    <?php 
                    if($current_image != "")
                    {
                        //Dispaly the image
                        ?>
                        <img src="<?php echo SITEURL ;?>images/student/<?php echo $current_image ;?>" width="100px">

                        <?php
                    }
                    else
                    {
                        //Display Message
                        echo "<div class='fail'>Image Not Added</div>";

                    
                    }
                    ?>
                </td>
        </tr>
        <tr>
            <td>NAME OF THE STUDENT</td>
            <td>
                : <input type="text" value="<?php echo $name;?>" name="name">
            </td>
        </tr>
        <tr style="margin-top:30px">
            <td>STUDENT IMAGE</td>
            <td>
                : <input type="file" name="image1">
            </td>
        </tr>

        <tr>
            <td>STATUS</td>
            <td>
            :
            <select name="status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            </td>
        </tr>

        <tr>
            <td>ADDMISSION NO.</td>
            <td>
            : <input type="text" value="<?php echo $ad_no ;?>" name="add_no">
            </td>
        </tr>
        <tr>
            <td>ROLL NO.</td>
            <td>
            : <input type="number" value="<?php echo $roll_no;?>" name="roll_no">
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
            : <select name="gender" >
                <option <?php if($gender=='Male')  {echo "selected";} ?> value="Male">Male</option>
                <option <?php if($gender=='Female'){echo "selected";} ?>  value="Female">Female</option>
                <option <?php if($gender=='Other') {echo "selected";} ?>  value="Other">Other</option>
            </select>
            </td>
        </tr>

        <tr>
            <td>Hostel / Day Scholar</td>
            <td>
              
            : <select name="hd" >
                 <option <?php if($hrd== 'Day Scholar'){echo "selected";} ?>  value="Day Scholar">Day Scholar</option>
                <option <?php if($hrd== 'Hostel')  {echo "selected";} ?> value="Hostel">Hostel</option>
                
               
            </select>
            </td>
        </tr>
        
        <tr>
            <td>DEGREE</td>
            <td>
            : <input type="text" value="<?php echo $degeree;?>" name="degree">
            </td>
        </tr>

        <tr>
            <td>DEPARTMENT</td>
            <td>
            : <input type="text" value="<?php echo $dept;?>" name="department">
            </td>
        </tr>

        <tr>
            <td>SEMESTER</td>
            <td>:
                <select name="semester" value="<?php $semester;?>" >
                    <option <?php if($semester=="I"){ echo "selected";} ?> value="I">I</option>
                    <option <?php if($semester=="II")  { echo "selected";} ?> value="II">II</option>
                    <option <?php if($semester=="III") { echo "selected";} ?> value="III">III</option>
                    <option <?php if($semester=="IV")  { echo "selected";} ?> value="IV">IV</option>
                    <option <?php if($semester=="V")   { echo "selected";} ?> value="V">V</option>
                    <option <?php if($semester=="VI")  { echo "selected";} ?>  value="VI">VI</option>
                    <option <?php if($semester=="VII") { echo "selected";} ?>   value="VII">VII</option>
                    <option <?php if($semester=="VIII"){ echo "selected";} ?>   value="VIII">VIII</option>
                   
                </select>
            </td>
        </tr>

        <tr>
            <td>SECTION</td>
            <td>:
                <select name="section" value="<?php echo $sec ;?>" >
                    <option  <?php if($sec=="A"){echo "selected";}?> value="A">A</option>
                    <option  <?php if($sec=="B"){echo "selected";}?> value="B">B</option>
                    <option  <?php if($sec=="C"){echo "selected";}?> value="C">C</option>
                    <option  <?php if($sec=="D"){echo "selected";}?> value="D">D</option>
                    <option  <?php if($sec=="E"){echo "selected";}?> value="E">E</option>
                    <option  <?php if($sec=="F"){echo "selected";}?> value="F">F</option>
                    <option  <?php if($sec=="G"){echo "selected";}?> value="G">G</option>
                    <option  <?php if($sec=="H"){echo "selected";}?> value="H">H</option>
                    <option  <?php if($sec=="I"){echo "selected";}?> value="I">I</option>
                    <option  <?php if($sec=="J"){echo "selected";}?> value="J">J</option>
                    <option  <?php if($sec=="K"){echo "selected";}?> value="K">K</option>
                    <option  <?php if($sec=="L"){echo "selected";}?> value="L">L</option>
                </select>        
            </td>
        </tr>

        <tr>
            <td>SCHOOL</td>
            <td>:
                 <select name="school" >

                 <option <?php if($school=="SCHOOL OF ENGINEERING & TECHNOLOGY"){echo "selected";}?> value="SCHOOL OF ENGINEERING & TECHNOLOGY">SCHOOL OF ENGINEERING & TECHNOLOGY</option>
                 <option <?php if($school=="SCHOOL OF AGRICULTURE & SCIENCE")   {echo "selected";}?>  value="SCHOOL OF AGRICULTURE & SCIENCE">SCHOOL OF AGRICULTURE & SCIENCE</option>
                 </select>
            </td>
        </tr>

        <tr>
           <td>COURSE</td>
           <td>:
           <select name="course" >
                <option value="btech">B.Tech</option>
                <option value="mtech">M.Tech</option>
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





        </body>