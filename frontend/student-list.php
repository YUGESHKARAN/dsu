<?php 

include('../config/constants.php') ;
//header('Content-Type: text/html; charset=UTF-8');


?>
 <?php
//  header('Content-Type: text/html; charset=UTF-8');
// if(isset($_POST['Dataab']))
// {
//  $check = $_POST['Dataab'];
 

// }
// else{
//   $check='checked';
//   echo $check;
  
  
// }
   

   ?>

<?php



if (isset($_POST['day']))
{
 
$day = $_POST['day'];
$hr =  $_POST['hour'];
$date = $_POST['date']; 
$name = $_POST['fname'];
$email = $_POST['femail'];


$sql = "SELECT DISTINCT S.roll_no,S.name,S.photo, S.semester,S.section,S.department,S.attendance_percentage,T.faculty_name,T.subject_name, T.hour from students AS S 
INNER JOIN time_table AS T ON S.department = T.department AND S.semester = T.semester
AND S.section = T.section  WHERE T.faculty_email ='$email' 
AND T.day='$day' AND T.hour = $hr  ORDER BY S.roll_no" ;

$res = mysqli_query($conn,$sql);
$res123= mysqli_query($conn,$sql);

$sql2 = "SELECT DISTINCT S.roll_no,S.name,S.photo, S.semester,S.section,S.department,T.faculty_name,T.subject_name, T.hour from students AS S 
INNER JOIN time_table AS T ON S.department = T.department AND S.semester = T.semester
AND S.section = T.section  WHERE T.faculty_email ='$email' 
AND T.day='$day' AND T.hour = $hr";

$res2 = mysqli_query($conn,$sql2);

$row2 = mysqli_fetch_assoc($res2);
$count2 = mysqli_num_rows($res2);

if($count2>0)
{
  $sub = $row2['subject_name'];
  $sec = $row2['section'];
  $sem= $row2['semester'];
?>

  <h3 class="blink-text"> ⚠️ Kindly mark the attendance for the subject - <span><?php echo $sub ;?></span> <?php echo $sem;?>  <?php echo $sec;?> ⚠️ </h3>


  <form action="<?php echo SITEURL;?>frontend/student-list2.php" class="formnewsearch" id="searchform" method="POST" enctype="multipart/form-data">
  
  <select name="searchsts">

        <option value="Absent" selected>Absent</option>
        <option value="Present">Present</option>
       
    </select>

  <div class="searchfrom">
    <input type="text" name="search" id="searchName" placeholder="Enter student roll number ">

    <input type="hidden" name="day" value="<?php echo $day ;?>">
    <input type="hidden" name="hour" value="<?php echo $hr ;?>">
    <input type="hidden" name="date" value="<?php echo $date ;?>">
    <input type="hidden" name="name" value="<?php echo $name ;?>">
    <input type="hidden" name="email" value="<?php echo $email ;?>">

    <input type="submit" name="submit" value="Search">
    </div>
   
  </form>


  <div class="atdmark right" id="btnback" onclick="absentShow()">MARK ALL ABSENT/PRESENT </div>
 
 
  <?php
}
  


  ?>
  
<div class="container">


<?php

$count = mysqli_num_rows($res);

if($count>0)
{
 ?>
 
 <form action="<?php echo SITEURL;?>frontend/form.php"  method="POST" id="presentcontainer"  enctype="multipart/form-data"class="student-cont present" style="position:relative; margin:auto;">
  
   <?php
   $u=0;
   $c=1;

   
  while($row=mysqli_fetch_assoc($res) )

  {
    $name = $row['name'];
    $roll = $row['roll_no'];
    $faculty_name = $row['faculty_name'];
    $semester = $row['semester'];
    $section = $row['section'];
    $department = $row['department'];
    $image = $row['photo'];
    $subject_name = $row['subject_name'];
    $percentage=$row['attendance_percentage'];

   


    
    ?>
   
   
  <div class="box student present" >
    
   <div class="std-info" id="atdbdr-<?php echo $c;?>">
     
       
   
     <?php
      if($image!="")
      {
        ?>
       <img  id="image-<?php echo $c;?>"  src="<?php echo SITEURL;?>images/student/<?php echo $image;?>">
        <?php
      }
      else{
        echo "<div style='color:red;'>Image not found</div>";
      }
      ?>
   
      
      
   
     <div class="content">
      
   
      
        <h3><?php echo $name;?></h3>
        <p><?php echo $roll;?></p>
       
       <div class="ptinfo">
       <h6  id="present-<?php echo $c;?>"  style="color:green">Present</h6>
       <h6  id="absent-<?php echo $c;?>"class="hidden" style="color:#e84118;">Absent</h6>
       <svg xmlns="http://www.w3.org/2000/svg" onclick="percentage(<?php echo $c;?>)" height="17px" viewBox="0 -960 960 960" width="17px" fill="#5f6368"><path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
        <p class="percentage" id="percentage-<?php echo $c;?>"><?php if($percentage>90.0){echo "<span style='color:green;'>$percentage%</span>";} elseif($percentage>80){echo "<span style='color:orange;'>$percentage%</span>";} elseif($percentage<80){echo "<span style='color:red;'>$percentage%</span>" ;} ?></p>
       
       </div>
        <div>
         
        
        <input type="checkbox"   onclick= "statusShow(<?php echo $c;?>)" checked name="formData[<?php echo $u;?>][atd-status]" value='1'> 

        </div>
        

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
        
     
     </div>

 

    
       </div>
       </div>


  
   <?php

   $u++;
   $c++;
   
  }
  ?>







<div  class="check" onclick="Btnsbt()">MARK ATTENDANCE</div>

<button type="submit" id="sub"  class="f-submit" value="submit">CONFIRM ATTENDANCE</button> 

</form>




</div>




<?php
}
  else{
    ?>
    
  <div class="recordnotFound">
    <!-- <img src="./images/desk4.png" alt=""> -->
  </div>
    <?php
  }
  ?>







   <?php



}
?>
</div>



























<?php

if (isset($_POST['day']))
{
 
$day = $_POST['day'];
$hr =  $_POST['hour'];
$date = $_POST['date']; 
$name = $_POST['fname'];
$email = $_POST['femail'];


$sql = "SELECT DISTINCT S.roll_no,S.name,S.photo, S.semester,S.section,S.department,S.attendance_percentage,T.faculty_name,T.subject_name, T.hour from students AS S 
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

  <h3 class="blink-text" style="display:none"> Kindly mark the attendance for the subject - <span><?php echo $sub ;?> <?php echo $sem;?> <?php echo $sec;?></span> ⚠️ </h3>

  <!-- <div class="atdmark right" onclick="absentShow()">MARK ALL ABSENT</div> -->
 <!-- <div type="submit" class="atdmark left">MARK ALL PRESENT</div> -->
 
  <?php
}
  


  ?>
  
<div class="container" style="margin-top:-0px;">


<?php

$count = mysqli_num_rows($res);

if($count>0)
{
 ?>
 
 <form action="<?php echo SITEURL;?>frontend/form.php"  method="POST"  id="absentcontainer"  enctype="multipart/form-data" class="student-cont absent" style="position:relative; margin:auto; margin-top:0;">
  
   <?php
   $u=0;
   $c=1;
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
    $percentage=$row['attendance_percentage'];


    
   



                           
   
   ?>
   
  <div class="box student present" >
    
   <div class="std-info abs" id="atdbdrabs-<?php echo $c;?>">
  
       
      <?php

      
      if($image!="")
      {
        ?>
        <img  id="imageabs-<?php echo $c;?>"  class="absentborder" src="<?php echo SITEURL;?>images/student/<?php echo $image;?>">
        <?php
      }
      else{
        echo "<div style='color:red;'>Image not found</div>";
      }
      ?>
      
      
   
     <div class="content">
      
      
        <h3><?php echo $name;?></h3>
        <p><?php echo $roll;?></p>
    
       
        
       <div class="ptinfo">
        <h6  id="presentabs-<?php echo $c;?>" class="hidden" style="color:green">Present</h6>
        <h6  id="absentabs-<?php echo $c;?>"  style="color:#e84118;">Absent</h6>
       <svg xmlns="http://www.w3.org/2000/svg" onclick="percentage1(<?php echo $c;?>)" height="17px" viewBox="0 -960 960 960" width="17px" fill="#5f6368"><path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
        <p class="percentage" id="percentage1-<?php echo $c;?>"><?php if($percentage>90.0){echo "<span style='color:green;'>$percentage%</span>";} elseif($percentage>80){echo "<span style='color:orange;'>$percentage%</span>";} elseif($percentage<80){echo "<span style='color:red;'>$percentage%</span>" ;} ?></p>
       
       </div>
        
        <div>
        
        <input type="checkbox"   onclick="statusShowabsent(<?php echo $c;?>)" unchecked name="formData[<?php echo $u;?>][atd-status]" value='1'> 
        </div>
        

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
        
     
     </div>

 

    
       </div>
       </div>


  
   <?php

   $u++;
   $c++;
   
  }
  ?>







<div  class="check" onclick="Btnsbtnew()">MARK ATTENDANCE</div>

<button type="submit" id="sub1"  class="f-submit" value="submit">CONFIRM ATTENDANCE</button> 

</form>




</div>





<?php
}
// else{
//   echo "<div style='color:red; text-align:center;font-size:20px'>No record found</div>";
// }
}
?>
</div>









<script>
  function Btnsbt()
       {
        console.log("function called");
        var das = document.getElementById("sub");
       
          das.classList.toggle("show");
  
       }
    
       function Btnsbtnew()
       {
        console.log("function called");
        var das = document.getElementById("sub1");
       
          das.classList.toggle("show");
  
       }

       function statusShow(index){
        var present =  document.getElementById("present-"+index);
        var absent = document.getElementById("absent-"+index);
        var image = document.getElementById("image-"+index);
        var stdboder = document.getElementById("atdbdr-"+index);
         
        
        present.classList.toggle("hidden");
        absent.classList.toggle("visible");
        image.classList.toggle("border");
        stdboder.classList.toggle("atdbdr")
        

       }
       

       function statusShowabsent(index){
        var present =  document.getElementById("presentabs-"+index);
        var absent = document.getElementById("absentabs-"+index);
        var image = document.getElementById("imageabs-"+index);
        var stdboder = document.getElementById("atdbdrabs-"+index);
         
        
        absent.classList.toggle("hidden");
        present.classList.toggle("visible");
        image.classList.toggle("borderabs");
        stdboder.classList.toggle("atdbdrabs")
        

       }

       function absentShow(){
        var abst =  document.getElementById('absentcontainer');
        var prset =   document.getElementById('presentcontainer');
        var back =   document.getElementById('btnback');

        back.classList.toggle("btnback")
        abst.classList.toggle("visible");
        prset.classList.toggle("hidden");
       }
       function percentage(index){
     var per = document.getElementById("percentage-"+index);
     per.classList.toggle("perce");
       }
     function percentage1(index){
     var per = document.getElementById("percentage1-"+index);
     per.classList.toggle("perce");
       }


  


</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="script.js"></script>