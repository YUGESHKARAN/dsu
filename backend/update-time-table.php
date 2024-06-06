

<?php include('./partials/front.php');?>

<?php


if (isset($_GET['sem']) AND isset($_GET['sec']) AND isset($_GET['dep']))

 {  $section = $_GET['sec'];
   $semester = $_GET['sem'];
   $department = $_GET['dep'];
   

   if(isset($_POST['submit']) AND isset($_POST['hour']) AND isset($_POST['day']) AND isset($_POST['sec']) AND isset($_POST['semester']))
   {

    $f_name = $_POST['name'];
    $s_name = $_POST['sub_name'];
    $f_email = $_POST['faculty_email'];
    $hour = $_POST['hour'];
    $day = $_POST['day'];
    $sec =  $_POST['sec'];
    $sem = $_POST['semester'];
    $dept = $_POST['department'];

   $sql = "UPDATE time_table SET
   faculty_name ='$f_name',
   subject_name = '$s_name',
   faculty_email = '$f_email'
 
   WHERE day='$day' AND hour = $hour AND section = '$sec' AND semester = '$sem' AND department = '$department'
   
   ";

   $res = mysqli_query($conn,$sql);
   if($res==TRUE)
   {
    $_SESSION['update'] = "<div class='success' style='color:green;font-size:17px;text-align:center;margin-top:20px;'>Time Table for  $day - $hour hour for Section $section, Department $department was successfully updated </div>";
    header("location:".SITEURL."backend/time-table.php");
   }

   else{
    $_SESSION['update'] = "<div class='fail' style='color:red;font-size:20px;text-align:center;'>Unable to update the Time Table </div>";
    header("location:".SITEURL."backend/time-table.php");
   }

   }

?>

<div class="adcontainer">
    <h1 style="color:#3B3B98">Update Time Table - <span style="color:#1B9CFC;"> Section <?php echo $section;?></span></h1>
   </div>
<div class="form-wrap">

   <?php 
   $n=1;
   while($n<7)
   {
    ?>
    <?php
     $sql = "SELECT subject_name, hour, faculty_name, faculty_email, day FROM time_table WHERE day='Monday' AND hour=$n AND semester = '$semester' AND section = '$section' AND department='$department'";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $subject_name = $row['subject_name'];
     $hr = $row['hour'];
     $day =$row['day'];
     $faculty_name = $row['faculty_name'];
     $faculty_id = $row['faculty_email'];
     ?>
      


   <div class="adcontainer">
    <h1 style="color:#3B3B98"><?php echo $day;?> <span style="color:#cd6133">Hour - <?php echo $hr;?></span></h1>
   </div>

 <form action=""  style="background-color:#e2d6ba;" method="POST" enctype="multipart/form-data" >
    <table class="std-add-tbl">
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
                <option <?php if($subject_name == $sub_name){ echo "selected";} ?> value="<?php echo $sub_name;?>"><?php echo $sub_name;?></option>
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
                <option <?php if($faculty_name==$name){echo "selected" ;} ?> value="<?php echo $name;?>"><?php echo $name;?></option>
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
                <option <?php if($faculty_id == $faculty_email){echo "selected" ;} ?> value="<?php echo $faculty_email;?>"><?php echo $faculty_email;?></option>
                <?php
            }

        
        }
        ?>
        </select>
    </td>
    </tr>

    <tr>
    <td colspan="2">
    <input type="hidden" name ="hour" value=<?php echo $hr;?>>
    <input type="hidden" name="day" value=<?php echo $day;?>>
    <input type="hidden" name="sec" value=<?php echo $section;?>>
    <input type="hidden" name="semester" value="<?php echo $semester;?>">
    <input type="hidden" namee="department" value = "<?php echo $department;?>">
    <input type="submit" name="submit" class="btn-update" value="Update <?php echo $day;?> <?php echo $hr;?> Hour">
    </td>
    </tr>

   </table>
    </form>
   

    
    <?php
    $n++;
   }
   ?>

</div>


<div class="form-wrap">

   <?php 
   $n=1;
   while($n<7)
   {
    ?>
    <?php
     $sql = "SELECT subject_name, hour, faculty_name, faculty_email, day FROM time_table WHERE day='Tuesday' AND hour=$n AND semester = '$semester' AND section = '$section' AND department='$department'";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $subject_name = $row['subject_name'];
     $hr = $row['hour'];
     $day =$row['day'];
     $faculty_name = $row['faculty_name'];
     $faculty_id = $row['faculty_email'];
     ?>
      

   <div class="adcontainer">
    <h1 style="color:#3B3B98"> <?php echo $day;?> <span style="color:#cd6133">Hour - <?php echo $hr;?></span></h1>
   </div>

 <form action="" method="POST"  style="background-color:#e2d6ba;" enctype="multipart/form-data" >
    <table class="std-add-tbl">
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
                <option <?php if($subject_name == $sub_name){ echo "selected";} ?> value="<?php echo $sub_name;?>"><?php echo $sub_name;?></option>
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
                <option <?php if($faculty_name==$name){echo "selected" ;} ?> value="<?php echo $name;?>"><?php echo $name;?></option>
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
                <option <?php if($faculty_id == $faculty_email){echo "selected" ;} ?> value="<?php echo $faculty_email;?>"><?php echo $faculty_email;?></option>
                <?php
            }

        
        }
        ?>
        </select>
    </td>
    </tr>

    <tr>
    <td colspan="2">
    <input type="hidden" name ="hour" value=<?php echo $hr;?>>
    <input type="hidden" name="day" value=<?php echo $day;?>>
    <input type="hidden" name="sec" value=<?php echo $section;?>>
    <input type="hidden" name="semester" value="<?php echo $semester;?>">
    <input type="hidden" namee="department" value = "<?php echo $department;?>">
    <input type="submit" name="submit" class="btn-update" value="Update <?php echo $day;?> <?php echo $hr;?> Hour">
    </td>
    </tr>

   </table>
    </form>
   

    
    <?php
    $n++;
   }
   ?>

</div>



<div class="form-wrap">

   <?php 
   $n=1;
   while($n<7)
   {
    ?>
    <?php
     $sql = "SELECT subject_name, hour, faculty_name, faculty_email, day FROM time_table WHERE day='Wednesday' AND hour=$n AND semester = '$semester' AND section = '$section' AND department='$department'";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $subject_name = $row['subject_name'];
     $hr = $row['hour'];
     $day =$row['day'];
     $faculty_name = $row['faculty_name'];
     $faculty_id = $row['faculty_email'];
     ?>
      

   <div class="adcontainer">
    <h1 style="color:#3B3B98"><?php echo $day;?> <span style="color:#cd6133">Hour - <?php echo $hr;?></span></h1>
   </div>

 <form action=""  style="background-color:#e2d6ba;" method="POST" enctype="multipart/form-data" >
    <table class="std-add-tbl">
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
                <option <?php if($subject_name == $sub_name){ echo "selected";} ?> value="<?php echo $sub_name;?>"><?php echo $sub_name;?></option>
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
                <option <?php if($faculty_name==$name){echo "selected" ;} ?> value="<?php echo $name;?>"><?php echo $name;?></option>
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
                <option <?php if($faculty_id == $faculty_email){echo "selected" ;} ?> value="<?php echo $faculty_email;?>"><?php echo $faculty_email;?></option>
                <?php
            }

        
        }
        ?>
        </select>
    </td>
    </tr>

    <tr>
    <td colspan="2">
    <input type="hidden" name ="hour" value=<?php echo $hr;?>>
    <input type="hidden" name="day" value=<?php echo $day;?>>
    <input type="hidden" name="sec" value=<?php echo $section;?>>
    <input type="hidden" name="semester" value="<?php echo $semester;?>">
    <input type="hidden" namee="department" value = "<?php echo $department;?>">
    <input type="submit" name="submit" class="btn-update" value="Update <?php echo $day;?> <?php echo $hr;?> Hour">
    </td>
    </tr>

   </table>
    </form>
   

    
    <?php
    $n++;
   }
   ?>

</div>


<div class="form-wrap">

   <?php 
   $n=1;
   while($n<7)
   {
    ?>
    <?php
     $sql = "SELECT subject_name, hour, faculty_name, faculty_email, day FROM time_table WHERE day='Thursday' AND hour=$n AND semester = '$semester' AND section = '$section' AND department='$department'";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $subject_name = $row['subject_name'];
     $hr = $row['hour'];
     $day =$row['day'];
     $faculty_name = $row['faculty_name'];
     $faculty_id = $row['faculty_email'];
     ?>
      

   <div class="adcontainer">
    <h1 style="color:#3B3B98"><?php echo $day;?> <span style="color:#cd6133">Hour - <?php echo $hr;?></span></h1>
   </div>

 <form action=""  style="background-color:#e2d6ba;" method="POST" enctype="multipart/form-data" >
    <table class="std-add-tbl">
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
                <option <?php if($subject_name == $sub_name){ echo "selected";} ?> value="<?php echo $sub_name;?>"><?php echo $sub_name;?></option>
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
                <option <?php if($faculty_name==$name){echo "selected" ;} ?> value="<?php echo $name;?>"><?php echo $name;?></option>
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
                <option <?php if($faculty_id == $faculty_email){echo "selected" ;} ?> value="<?php echo $faculty_email;?>"><?php echo $faculty_email;?></option>
                <?php
            }

        
        }
        ?>
        </select>
    </td>
    </tr>

    <tr>
    <td colspan="2">
    <input type="hidden" name ="hour" value=<?php echo $hr;?>>
    <input type="hidden" name="day" value=<?php echo $day;?>>
    <input type="hidden" name="sec" value=<?php echo $section;?>>
    <input type="hidden" name="semester" value="<?php echo $semester;?>">
    <input type="hidden" namee="department" value = "<?php echo $department;?>">
    <input type="submit" name="submit" class="btn-update" value="Update <?php echo $day;?> <?php echo $hr;?> Hour">
    </td>
    </tr>

   </table>
    </form>
   

    
    <?php
    $n++;
   }
   ?>

</div>
     


<div class="form-wrap">

   <?php 
   $n=1;
   while($n<7)
   {
    ?>
    <?php
     $sql = "SELECT subject_name, hour, faculty_name, faculty_email, day FROM time_table WHERE day='Friday' AND hour=$n AND semester = '$semester' AND section = '$section' AND department='$department'";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $subject_name = $row['subject_name'];
     $hr = $row['hour'];
     $day =$row['day'];
     $faculty_name = $row['faculty_name'];
     $faculty_id = $row['faculty_email'];
     ?>
      

   <div class="adcontainer">
    <h1 style="color:#3B3B98"><?php echo $day;?> <span style="color:#cd6133">Hour - <?php echo $hr;?></span></h1>
   </div>

 <form action="" style="background-color:#e2d6ba;" method="POST" enctype="multipart/form-data" >
    <table class="std-add-tbl" >
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
                <option <?php if($subject_name == $sub_name){ echo "selected";} ?> value="<?php echo $sub_name;?>"><?php echo $sub_name;?></option>
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
                <option <?php if($faculty_name==$name){echo "selected" ;} ?> value="<?php echo $name;?>"><?php echo $name;?></option>
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
                <option <?php if($faculty_id == $faculty_email){echo "selected" ;} ?> value="<?php echo $faculty_email;?>"><?php echo $faculty_email;?></option>
                <?php
            }

        
        }
        ?>
        </select>
    </td>
    </tr>

    <tr>
    <td colspan="2">
    <input type="hidden" name ="hour" value=<?php echo $hr;?>>
    <input type="hidden" name="day" value=<?php echo $day;?>>
    <input type="hidden" name="sec" value=<?php echo $section;?>>
    <input type="hidden" name="semester" value="<?php echo $semester;?>">
    <input type="hidden" namee="department" value = "<?php echo $department;?>">
    <input type="submit" name="submit" class="btn-update" value="Update <?php echo $day;?> <?php echo $hr;?> Hour">
    </td>
    </tr>

   </table>
    </form>
   

    
    <?php
    $n++;
   }
   ?>

</div>

   <?php
   
   
}



   

 
?>

