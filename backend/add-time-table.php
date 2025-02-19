<?php 
include('./partials/front.php');
?>

<?php

if(isset($_POST['submit']))
{
    $day = $_POST['day'];
    $hour = $_POST['hour'];
    $semester = $_POST['semester'];
    $department = $_POST['department'];
    $section =$_POST['section'];
    $faculty_name = $_POST['name'];
    $subject_name =$_POST['sub_name'];
    $faculty_email = $_POST['faculty_email'];


    $sql = "INSERT INTO time_table SET
    day = '$day',
    hour = $hour,
    semester = '$semester',
    department = '$department',
    section = '$section',
    faculty_name = '$faculty_name',
    subject_name = '$subject_name',
    faculty_email = '$faculty_email' 
    "; 
    
    $res = mysqli_query($conn,$sql);
    if($res==TRUE){
        $_SESSION['add'] = "<div class='success' style='color:green;text-align:center;font-size:20px;'>Time table added successfully</div>";
        header("location:".SITEURL."backend/time-table.php");
    }
    else{
        $_SESSION['add'] = "<div class='fail' style='color:red;text-align:center;font-size:20px;'>Unable to add time table</div>";
        header("location:".SITEURL."backend/time-table.php");
    }
}
?>


<div class="adcontainer">
    <h1 style="color:#2980b9">ADD TIME-TABLE</h1>
</div>
<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data" >

      <table class="std-add-tbl" >
       <tr>
        <td>DAY OF A WEEK</td>
        <td>
          : <select name="day" >
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
           </select>
        </td>
       </tr>

       <tr>
        <td>HOUR</td>
        <td>
           : <select name="hour" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
           </select>
        </td>
       </tr>

       <tr>
        <td>SEMESTER</td>
        <td>
           :  <select name="semester" >
            <?php
            $sql = "SELECT DISTINCT F.semester FROM faculty_tbl AS F , subject_tbl AS S WHERE  F.semester=S.semester AND F.department=S.department AND F.sub_id=S.sub_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $sem = $row['semester'];
                    ?>
                    <option value="<?php echo $sem;?>"><?php echo $sem;?></option>
                    <?php
                }
            }
            ?>
            </select>
        </td>
       </tr>

       <tr>
        <td>DEPARTMENT</td>
        <td>
           :  <select name="department" >
            <?php
            $sql = "SELECT DISTINCT F.department FROM faculty_tbl AS F , subject_tbl AS S WHERE  F.semester=S.semester AND F.department=S.department AND F.sub_id=S.sub_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $dept = $row['department'];
                    ?>
                    <option value="<?php echo $dept;?>"><?php echo $dept;?></option>
                    <?php
                }
            }
            ?>
            </select>
        </td>
       </tr>

       <tr>
        <td>SECTION</td>
        <td>
           :  <select name="section" >
            <?php
            $sql = "SELECT DISTINCT F.section FROM faculty_tbl AS F , subject_tbl AS S WHERE  F.semester=S.semester AND F.department=S.department AND F.sub_id=S.sub_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $sec = $row['section'];
                    ?>
                    <option value="<?php echo $sec;?>"><?php echo $sec;?></option>
                    <?php
                }
            }
            ?>
            </select>
        </td>
       </tr>

       <tr>
        <td>SUBJECT NAME</td>
        <td>
           :  <select name="sub_name" >
            <?php
            $sql = "SELECT DISTINCT S.subject_name,S.sub_id FROM faculty_tbl AS F , subject_tbl AS S WHERE  F.semester=S.semester AND F.department=S.department AND F.sub_id=S.sub_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $sub_name = $row['subject_name'];
                    
                    ?>
                    <option value="<?php echo $sub_name;?>"><?php echo $sub_name;?></option>
                    <?php
                }

            
            }
            ?>
            </select>
        </td>
       </tr>

       <tr>
        <td>FACULTY NAME</td>
        <td>
           :  <select name="name" >
            <?php
            $sql = "SELECT DISTINCT F.faculty_name FROM faculty_tbl AS F , subject_tbl AS S WHERE  F.semester=S.semester AND F.department=S.department AND F.sub_id=S.sub_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $name = $row['faculty_name'];
                    ?>
                    <option value="<?php echo $name;?>"><?php echo $name;?></option>
                    <?php
                }
            }
            ?>
            </select>
        </td>
       </tr>

       <tr>
        <td>FACULTY EMAIL ID</td>
        <td>
           :  <select name="faculty_email">
            <?php
            $sql = "SELECT DISTINCT F.email FROM faculty_tbl AS F , subject_tbl AS S WHERE  F.semester=S.semester AND F.department=S.department AND F.sub_id=S.sub_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $faculty_email = $row['email'];
                    
                    ?>
                    <option value="<?php echo $faculty_email;?>"><?php echo $faculty_email;?></option>
                    <?php
                }

            
            }
            ?>
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