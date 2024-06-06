<?php 

include('../config/constants.php') ;



?>


<?php



if (isset($_POST['day']))
{
 
$day = $_POST['day'];
$hr =  $_POST['hour'];
$date = $_POST['date']; 
$name = $_POST['fname'];
$email = $_POST['femail'];


$sql = "SELECT DISTINCT S.roll_no,S.name,S.photo, S.semester,S.section,S.department,T.faculty_name,T.subject_name, T.hour from students AS S 
INNER JOIN time_table AS T ON S.department = T.department AND S.semester = T.semester
AND S.section = T.section  WHERE T.faculty_email ='$email' 
AND T.day='$day' AND T.hour = $hr  ORDER BY S.roll_no" ;

$res = mysqli_query($conn,$sql);

$sql2 = "SELECT DISTINCT S.roll_no,S.name,S.photo, S.semester,S.section,S.department,T.faculty_name,T.subject_name, T.hour from students AS S 
INNER JOIN time_table AS T ON S.department = T.department AND S.semester = T.semester
AND S.section = T.section  WHERE T.faculty_email ='$email' 
AND T.day='$day' AND T.hour = $hr"  ;

$res2 = mysqli_query($conn,$sql2);

$row2 = mysqli_fetch_assoc($res2);
$count2 = mysqli_num_rows($res2);

if($count2>0)
{
  $sub = $row2['subject_name'];
  $sec = $row2['section'];
  $sem= $row2['semester'];
?>

  <h3 class="blink-text"> ⚠️ Kindly mark the attendance for the subject - <span><?php echo $sub ;?> <?php echo $sem;?> / <?php echo $sec;?></span> ⚠️ </h3>
  <?php
}
  ?>
  
<div class="container">


<?php

$count = mysqli_num_rows($res);

if($count>0)
{
 ?>
 
 <form action="<?php echo SITEURL;?>frontend/form.php" method="POST" enctype="multipart/form-data"class="student-cont" style="position:relative; margin:auto;">
   <?php
   $u=0;
  while($row=mysqli_fetch_assoc($res))

  {
    $name = $row['name'];
    $roll = $row['roll_no'];
    $faculty_name = $row['faculty_name'];
    $semester = $row['semester'];
    $section = $row['section'];
    $department = $row['department'];
    $image = $row['photo'];
    $subject_name = $row['subject_name'];
   
   ?>
   <div class="box student">
   <div class="std-card faculty student">
  
       <div class="top">
      <?php
      if($image!="")
      {
        ?>
        <img src="<?php echo SITEURL;?>images/student/<?php echo $image;?>">
        <?php
      }
      else{
        echo "<div style='color:red;'>Image not found</div>";
      }
      ?>
      <div class="name"><?php echo $name;?></div>
     </div>
     <div class="botm">
      <table style="text-align:left;padding:20px;">
        <tr>
          <th >Roll No.</th>
          <td>: <?php echo $roll;?></td>
        </tr>
       
        <tr>
          <th>Semester</th>
          <td>: <?php echo $semester;?></td>
        </tr>

        <tr>
          <th>Section</th>
          <td>: <?php echo $section;?></td>
        </tr>
        <tr>
          <th>Department</th>
          <td>: <?php echo $department;?></td>
        </tr>
        <tr>
          <td>
            <br>
            <input type="radio" id="lang-1-<?php echo $u;?>" name="formData[<?php echo $u;?>][atd-status]" class="radio" value="Present" checked>
            <label class="label label-1" for="lang-1-<?php echo $u;?>">Present</label> 
          </td>
          <td>
              <br>
              <input type="radio" id="lang-2-<?php echo $u;?>" name="formData[<?php echo $u;?>][atd-status]" class="radio" value="Absent">
              <label class="label label-2" for="lang-2-<?php echo $u;?>">Absent</label>
            </td>
          
        </tr>

        <tr>
          <td colspan="2">
            <input type="hidden" name="formData[<?php echo $u;?>][sem]" value="<?php echo $semester;?>">
            <input type="hidden" name="formData[<?php echo $u;?>][sec]" value="<?php echo $section;?>">
            <input type="hidden" name="formData[<?php echo $u;?>][name]" value="<?php echo $name;?>">
            <input type="hidden" name="formData[<?php echo $u;?>][faculty_name]" value="<?php echo $faculty_name;?>">
            <input type="hidden" name="formData[<?php echo $u;?>][roll_no]" value="<?php echo $roll;?>">
            <input type="hidden" name="formData[<?php echo $u;?>][dt]" value="<?php echo $date;?>">
            <input type="hidden" name="formData[<?php echo $u;?>][dy]" value="<?php echo $day;?>">
            <input type="hidden" name="formData[<?php echo $u;?>][hr]" value="<?php echo $hr;?>">
            <input type="hidden" name="count" value="<?php echo $count;?>">
            <input type="hidden" name="formData[<?php echo $u;?>][subject]" value="<?php echo $subject_name;?>">

            <input type="hidden" name="formData[<?php echo $u;?>][department]" value="<?php echo $department;?>">
            
            
          </td>
        </tr>
      </table>
     </div>

 

    
       </div>
       </div>
   <?php

   $u++;
  }
  ?>
 <button type="submit" id="submit" class="f-submit" value="submit">MARK ATTENDANCE</button>

</form>



<?php
}
else{
  echo "<div style='color:red; text-align:center;font-size:20px'>No record found</div>";
}
}
?>
</div>
 