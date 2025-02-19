<?php
include('./partials-fronts/navbar.php');
include('./partials-fronts/verify-faculty-login.php');

$firstdate = new DateTime();
$CurrentDay = $firstdate->format('l');


//  $faculty_name = $_SESSION['faculty-name'];
    $faculty_email = $_SESSION['faculty-email'];
?>

<marquee behavior="" scrollamount="5" style="margin:auto;color:#000000;font-size: 17px;font-family: poppins; font-weight: 650; width: 100%;" direction=""> Welcome to "<span style="color:  rgb(140, 68, 228);"> class link </span>" the ultimate solution for hassle-free attendance management.
  Streamline your classroom tracking, empower students with real-time updates, and simplify educators' tasks with our intuitive platform  </marquee>
  <hr>

 <SPAN class="table-head"  style="text-align: center;"><h1> 📌 TODAY'S SCHEDULE  <span class="day" style="color:#6c5ce7;"> - <?php echo $CurrentDay;?></span></h1></SPAN>


<div class="table">



<table>

<tr>
    <th>Hour</th>
    <th>CLASS</th>
</tr>
<?php 



  $hr=1;

    while($hr<7)
    {
        $sql = "SELECT * FROM time_table WHERE faculty_email = '$faculty_email' AND day='$CurrentDay' AND hour=$hr ";
        $res = mysqli_query($conn,$sql);
       $row = mysqli_fetch_assoc($res);
       $count = mysqli_num_rows($res);
       if($count>0)
       {
       $subject = $row['subject_name'] ;
       $sem = $row['semester'];
       $section = $row['section']

        ?>

        <tr>

        <th ><?php echo $hr;?></th>

        <td style="font-weight:600;"><span style="color:black;font-weight:600; margin-right:10px;">SEM - <?php echo $sem ;?></span>   <span style="color:black;font-weight:600; margin-right:10px;">SEC - <?php echo $section ;?></span>   <span style="color:black;font-weight:600;">SUB - <?php echo $subject ;?></span> </td>

        </tr>
          
        <?php
        }
        else{
            ?>
             <tr>

            <th ><?php echo $hr;?></th>

            <td><span style="color:blue;font-weight:600;">OFF TIME</span></td>

            </tr>
            <?php
        }
        $hr++;

    }

?>



</table>
</div>
<br>

<div>
  <SPAN class="table-head" style="text-align: center; top: 30px;"><h1> 📌 WEEKLY TIME TABLE </h1></SPAN></div>

<table class="table1" >

  <tr>
    <th>DAY</th>
    <TH>1 HOUR</TH>
    <TH>2 HOUR</TH>
    <TH>3 HOUR</TH>
    <TH>4 HOUR</TH>
    <TH>5 HOUR</TH>
    <TH>6 HOUR</TH>
    
  </tr>
  <tr>
    <th>MONDAY</th>
    <?php 



$hr=1;

  while($hr<7)
  {
      $sql = "SELECT * FROM time_table WHERE faculty_email = '$faculty_email' AND day='Monday' AND hour=$hr ";
      $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $count = mysqli_num_rows($res);
     if($count>0)
     {
     $subject = $row['subject_name'] ;
     $sem = $row['semester'];
     $section = $row['section']

      ?>

     <td style="background:#81ececa7"><?php echo $subject;?> <br> (<?php echo $sem;?> / <?php echo $section;?>)</td>
        
      <?php
      }
      else{
          ?>
           <td>OFF TIME</td>
          <?php
      }
      $hr++;

  }

?>
  </tr>


  <tr>
    <th>TUESDAY</th>
    <?php 



$hr=1;

  while($hr<7)
  {
      $sql = "SELECT * FROM time_table WHERE faculty_email = '$faculty_email' AND day='Tuesday' AND hour=$hr ";
      $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $count = mysqli_num_rows($res);
     if($count>0)
     {
     $subject = $row['subject_name'] ;
     $sem = $row['semester'];
     $section = $row['section']

      ?>

     <td style="background:#81ececa7"><?php echo $subject;?> <br> (<?php echo $sem;?> / <?php echo $section;?>)</td>
        
      <?php
      }
      else{
          ?>
           <td>OFF TIME</td>
          <?php
      }
      $hr++;

  }

?>

  <tr>


    <th>WEDNESDAY</th>
    <?php 



$hr=1;

  while($hr<7)
  {
      $sql = "SELECT * FROM time_table WHERE faculty_email = '$faculty_email' AND day='Wednesday' AND hour=$hr ";
      $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $count = mysqli_num_rows($res);
     if($count>0)
     {
     $subject = $row['subject_name'] ;
     $sem = $row['semester'];
     $section = $row['section']

      ?>

     <td style="background:#81ececa7"><?php echo $subject;?> <br> (<?php echo $sem;?> / <?php echo $section;?>)</td>
        
      <?php
      }
      else{
          ?>
           <td>OFF TIME</td>
          <?php
      }
      $hr++;

  }

?>
  </tr>

  <tr>
    <th>THURSDAY</th>
    <?php 



$hr=1;

  while($hr<7)
  {
      $sql = "SELECT * FROM time_table WHERE faculty_email = '$faculty_email' AND day='Thursday' AND hour=$hr ";
      $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $count = mysqli_num_rows($res);
     if($count>0)
     {
     $subject = $row['subject_name'] ;
     $sem = $row['semester'];
     $section = $row['section']

      ?>

     <td style="background:#81ececa7"><?php echo $subject;?> <br> (<?php echo $sem;?> / <?php echo $section;?>)</td>
        
      <?php
      }
      else{
          ?>
           <td>OFF TIME</td>
          <?php
      }
      $hr++;

  }

?>
  </tr>

  <tr>
    <th>FRIDAY</th>
    <?php 



$hr=1;

  while($hr<7)
  {
      $sql = "SELECT * FROM time_table WHERE faculty_email = '$faculty_email' AND day='Friday' AND hour=$hr ";
      $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $count = mysqli_num_rows($res);
     if($count>0)
     {
     $subject = $row['subject_name'] ;
     $sem = $row['semester'];
     $section = $row['section']

      ?>

     <td style="background:#81ececa7"><?php echo $subject;?> <br> (<?php echo $sem;?> / <?php echo $section;?>)</td>
        
      <?php
      }
      else{
          ?>
           <td>OFF TIME</td>
          <?php
      }
      $hr++;

  }

?>
  </tr>





</table>







</div>
<br>
<br>
<center><h1 class="qwer"> ⫷ HANDLING CLASSES ⫸  </h1></center>




<div class="container123">
 

  
  <div class="class-info">
    <?php
  
    $sql2="SELECT DISTINCT F.sub_id, F.department,F.email,F.semester, F.section, S.subject_name, S.sub_id, S.sub_type From faculty_tbl as F INNER JOIN  subject_tbl as S on S.sub_id= F.sub_id WHERE F.email='$faculty_email' order by F.section";
    $res2 = mysqli_query($conn,$sql2);
    $count = mysqli_num_rows($res2);
    if($count>0)
    {
      while($row2 = mysqli_fetch_assoc($res2))
      {
          $semester = $row2['semester'];
          $department = $row2['department'];
          $sec = $row2['section'];
          $subject_name = $row2['subject_name'];
          $sub_type = $row2['sub_type'];

          ?>

          <div class="row">
            <div class="semester"> ▶ SEMESTER <?php echo $semester;?></div>
            <div class="department"><?php echo $department;?> </div>
            <div class="section"><?php echo $sec;?> </div>
            <div class="subject"><?php echo $subject_name;?> - <?php echo $sub_type;?></div>
          </div>

          <?php
      }
    }
    else{
      ?>
    <div class="row">
            <div class="semester"> NO DATA FOUND</div>
     
          </div>

      <?php
    }

    ?>



  </div>
</div>


