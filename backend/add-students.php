<?php 
  if(isset($_SESSION['add']))
  {
      echo $_SESSION['add']; // displaying session message
      unset($_SESSION['add']); //removing session message
  }

  if(isset($_SESSION['upload']))
  {
      echo $_SESSION['upload']; // displaying session message
      unset($_SESSION['upload']); //removing session message
  }



  
?>


<?php 
include('./partials/front.php');
if(isset($_POST['submit']))

{
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
          
          $destination_path = "../images/student/".$image_name;

          // Upload the image
          $upload = move_uploaded_file($source_path,$destination_path);

          //check image upoladed or not
          //if not upload stop the process and redirect with error messsage
          if($upload==false)
          {
            //SET message
            $_SESSION['upload'] = "<div class='fails'> Failed to Upload Image</div>"  ;

            header("location:".SITEURL.'backend/add-students.php');

            // Stop the process
            die();
          }
     }
    }
    else{

      //don't upload the image and set the image_name value blank

      $image_name = "";
    }

   


    $sql = "INSERT INTO students SET
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
     gender='$gender',
     hd ='$hrd',
     attendance_percentage =''
    ";

    $res = mysqli_query($conn, $sql) or die(mysql_error());

    if($res == TRUE)
    {
        $_SESSION['add'] = "<div class='success' style='text-align:center;'> Student details added successfully.</div>";

        header('location:'.SITEURL.'backend/students.php');
        exit;
     
    }

    else{
        $_SESSION['add'] = "<div class='fail'>Failed to add student details.</div>";

        header("location:".SITEURL."backend/add-students.php");
    }
}
          
?>
<body>
<div class="adcontainer">
    <h1 style="color:#2980b9">ADD STUDENT DETAILS</h1>
</div>


       

<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="std-add-tbl">
        <tr>
            <td>NAME OF THE STUDENT</td>
            <td>
                 <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>GENDER</td>
            <td>
                <select name="gender" required>
                <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </td>
        </tr>
        <tr style="margin-top:30px">
            <td>STUDENT IMAGE</td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>
        <tr>
            <td>HOSTEL/DAYSCHOLAR</td>
            <td>
                <select name="hd" required >
                <option value="Day Scholar" selected>Day Scholar</option>
                    <option value="Hostel">Hostel</option>
                    
                </select>
            </td>
        </tr>
        <tr>
            <td>STATUS</td>
            <td>
               
            <select name="status">
                <option value="Active" selected>Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            </td>
        </tr>

        <tr>
            <td>ADDMISSION NO.</td>
            <td>
                <input type="text" name="add_no">
            </td>
        </tr>
        <tr>
            <td>ROLL NO.</td>
            <td>
                <input type="number" name="roll_no">
            </td>
        </tr>

        <tr>
            <td>DEGREE</td>
            <td>
                <input type="text" name="degree" value="UG">
            </td>
        </tr>

        <tr>
            <td>DEPARTMENT</td>
            <td>
                <input type="text" name="department" value="AI&DS">
            </td>
        </tr>

        <tr>
            <td>SEMESTER</td>
            <td>
                <select name="semester">
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                    <option value="VI" selected>VI</option>
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                   
                </select>
            </td>
        </tr>

        <tr>
            <td>SECTION</td>
            <td>
                <select name="section" >
                    <option value="A">A</option>
                    <option value="B" selected>B</option>
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
            <td>SCHOOL</td>
            <td>
                 <select name="school" >

                 <option value="SCHOOL OF ENGINEERING & TECHNOLOGY">SCHOOL OF ENGINEERING & TECHNOLOGY</option>
                 <option value="SCHOOL OF AGRICULTURE & SCIENCE">SCHOOL OF AGRICULTURE & SCIENCE</option>
                 </select>
            </td>
        </tr>

        <tr>
           <td>COURSE</td>
           <td>
           <select name="course" >
                <option value="btech">B.Tech</option>
                <option value="mtech">M.Tech</option>
            </select>
           </td>
        </tr>
        <tr>
            <td clspan="2" class="submit">
                <input type="submit" name="submit" class="btn-update" value="click to add" >
            </td>
        </tr>
      </table>

    </form>
    

</div>




</body>

<?php

?>