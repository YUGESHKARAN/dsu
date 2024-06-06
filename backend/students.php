<?php include('./partials/front.php');
?>
<body>
<div class="adcontainer">
    <h1>DSU STUDENT CONTROL PANNEL</h1>
</div>


<div class="header">
    <div class="head">
        <h2>Manage Student Information</h2>
    </div>
    <div class="btn">
        <a href="add-students.php" class="btn-add">ADD STUDENT</a>
    </div>
</div>


<div class="wrapper">
    <div class="adcontainer" >
        <h3 style="color:blue; font-size:29px;">Students Information</h3>
    </div>
    <?php

if(isset($_SESSION['failed-remove']))
{
    echo $_SESSION['failed-remove']; // displaying session message
    unset($_SESSION['failed-remove']); //removing session message
}
 if(isset($_SESSION['add']))
 {
     echo $_SESSION['add']; // displaying session message
     unset($_SESSION['add']); //removing session message
 }
 if(isset($_SESSION['delete']))
 {
     echo $_SESSION['delete']; // displaying session message
     unset($_SESSION['delete']); //removing session message
 }

 if(isset($_SESSION['student-not-found']))
 {
     echo $_SESSION['student-not-found']; // displaying session message
     unset($_SESSION['student-not-found']); //removing session message
 }
 if(isset($_SESSION['update']))
 {
     echo $_SESSION['update']; // displaying session message
     unset($_SESSION['update']); //removing session message
 }
 if(isset($_SESSION['upload']))
 {
     echo $_SESSION['upload']; // displaying session message
     unset($_SESSION['upload']); //removing session message
 }
 if(isset($_SESSION['failed-remove']))
 {
     echo $_SESSION['failed-remove']; // displaying session message
     unset($_SESSION['failed-remove']); //removing session message
 }
?>
<div class="std-container">

<?php


$sql = "SELECT * FROM students ORDER BY roll_no";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);

if( $count>0){

    while($row = mysqli_fetch_assoc($res)){
    $id = $row['s_no'];   
    $name = $row['name'];
    $image=$row['photo'];
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

?>
      <div class="std-card">
        
            <div class="top">

          <?php

          if($image==""){
            echo "<div class='fail'>Image not available</div>";
          }
          else{

          ?>
        <img src="<?php echo SITEURL;?>images/student/<?php echo $image;?>" alt="">

           <?php
           }

           ?>     



                <div class="name"><?php echo $name ;?><span style="font-size:12px;" ><?php if($status=="Active"){echo "<p style='color:green'> *$status</p>";} else{echo "<p style='color:red'> *$status</p>";}?></span></div>

            </div>
            <div class="botm">
                <table class="tbl">
                       <tr>
                            <td class="bold">SCHOOL </td>
                            <td>: <?php echo $school ?></td>
                        </tr>
                        <tr>
                            <td class="bold">GENDER </td>
                            <td>:<?php echo $gender ;?></td>
                        </tr>
                        <tr>
                            <td class="bold">HOSTEL / DAY SCHOLAR </td>
                            <td>:<?php echo $hrd;?></td>
                            
                        </tr>

                        <tr>
                            <td class="bold">ADDMISSION NO. </td>
                            <td>: <?php echo $ad_no ;?></td>
                        </tr>

                        <tr>
                            <td class="bold">ROLL NO. </td>
                            <td>: <?php echo $roll_no;?></td>
                        </tr>
                        <tr>
                            <td class="bold">DEGREE </td>
                            <td>: <?php echo $degeree ;?></td>
                        </tr>

                        <tr>
                            <td class="bold">DEPARTMENT </td>
                            <td>:<?php echo $dept ;?></td>
                        </tr>

                        <tr>
                            <td class="bold">SEMESTER </td>
                            <td>: <?php echo $semester;?></td>
                        </tr>

                        <tr>
                            <td class="bold">SECTION </td>
                            <td>: <?php echo $sec;?></td>
                        </tr>

                        <tr>
                            <td class="bold">COURSE NAME </td>
                            <td>: <?php echo $course;?></td>
                        </tr>
                        <tr style="margin-top:30px;">
                            <td><a href="<?php echo SITEURL;?>backend/update-student.php?id=<?php echo $id;?>" class="btn-update" style="display:inline-block;margin-top:20px;">Update</a></td>
                            <td><a href="<?php echo SITEURL;?>backend/delete-student.php?id=<?php echo $id;?>&image_name=<?php echo $image;?>&sem=<?php echo $semester;?>&rno=<?php echo $roll_no;?>&name=<?php echo $name;?>" class="btn-del"  style="display:inline-block;margin-top:20px;">Delete</a></td>
                        </tr>
                </table>

          </div>
        </div>

      
        <?php

    }

    
}
else{
    echo "<div  style='text-align:center;font-size:27px;color:green;width:100%;'>No Student details available !</div>";
 }

?>


      </div>

      </div>

     
</body>


