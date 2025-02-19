<?php include('./partials/front.php');
?>
<body>
<div class="adcontainer">
    <h1>DSU TIME-TABLE CONTROL PANEL</h1>
</div>
<?php
//SELECT DISTINCT S.name, S.roll_no, T.hour from students AS S INNER JOIN time_table AS T ON S.department = T.department AND S.semester = T.semester AND S.section = T.section  WHERE T.faculty_email ='ramachandran@faculty123.com' AND T.day='Tuesday'  ORDER by T.hour ;

if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}

if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
?>

<body style='height:300vh'>

<div class="header">
    <div class="head">
        <h2>Manage Time-Table Information</h2>
        
    </div>
    <div class="btn">
        <a href="add-time-table.php" class="btn-add time-able">ADD TIME-TABLE</a>
    </div>
</div>


<!-----TIME TABALE 1------>
   
<h3 class='table-class-title'>Class Time Table 1</h3>

<div class="table-wrapper" >
  
    <div>
        <p>Section -</p>
        <h4>B</h4>
    </div>
    <div>
        <p>Semster -</p>
        <h4>VI</h4>
    </div>
    <div>
        <p>Department -</p>
        <h4>AI&DS</h4>
    </div>
    
</div>



<table class="time-table" border>

<tr>
    <th>DAY</th>
    <th>1<sup>st</sup>Hour</th>
    <th>2<sup>nd</sup>Hour</th>
    <th>3<sup>rd</sup>Hour</th>
    <th>4<sup>th</sup>Hour</th>
    <th>5<sup>th</sup>Hour</th>
    <th>6<sup>th</sup>Hour</th>
</tr>

<tr>
<th>Monday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Monday' AND section='B' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    "<td colspan='6'>NO data available</td>";
  }

  ?>
  
  
</tr>

<tr>
<th>Tuesday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Tuesday' AND section='B' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    "<td colspan='6'>NO data available</td>";
  }

  ?>

  
    
  
</tr>

<tr>
<th>Wednesday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Wednesday' AND section='B' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Thursday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Thursday' AND section='B' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        "<td colspan='6'>NO data available</td>";
    }

  }
  else{
    "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Friday</th>
  <?php 

  $sql ="SELECT subject_name,section,department,semester FROM time_table WHERE day='Friday' AND section='B' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            $sec = $row['section'];
            $dept = $row['department'];
            $sem = $row['semester'];

            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    "<td colspan='6'>NO data available</td>";
 }

  ?>
  
    
  
</tr>

<tr>

<?php
$sql ="SELECT subject_name,section,department,semester FROM time_table WHERE  section='B' AND semester='VI' AND department='AI&DS'";
$res = mysqli_query($conn,$sql);
$row  = mysqli_fetch_assoc($res);
$sem = $row['semester'];
$dept =  $row['department'];
$sec = $row['section'];

?>
    <td colspan='7'>
    <a href="<?php echo SITEURL;?>backend/delete-time-table.php?sec=<?php echo $sec;?>&dept=<?php echo $dept;?>" class="btn-del table"  >Delete Table</a>
    <a href="<?php echo SITEURL;?>backend/update-time-table.php?sec=<?php echo $sec;?>&dep=<?php echo urlencode($dept);?>&sem=<?php echo $sem ;?> " class="btn-update table" style='margin-left:50px;' >Update Table</a>

    </td>
    
</tr>




</table>



<!--------time table 1 end ------->

<!-----TIME TABALE 2------>
<!--    
<h3 class='table-class-title'>Class Time Table 2</h3>

<div class="table-wrapper" >
  
    <div>
        <p>Section -</p>
        <h4>A</h4>
    </div>
    <div>
        <p>Semster -</p>
        <h4>VI</h4>
    </div>
    <div>
        <p>Department -</p>
        <h4>AI&DS</h4>
    </div>
    
</div>


<table class="time-table" border>

<tr>
    <th>DAY</th>
    <th>1<sup>st</sup>Hour</th>
    <th>2<sup>nd</sup>Hour</th>
    <th>3<sup>rd</sup>Hour</th>
    <th>4<sup>th</sup>Hour</th>
    <th>5<sup>th</sup>Hour</th>
    <th>6<sup>th</sup>Hour</th>
</tr>

<tr>
<th>Monday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Monday' AND section='A' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        echo "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    echo  "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Tuesday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Tuesday' AND section='A' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        echo  "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    echo  "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Wednesday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Wednesday' AND section='A' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        echo  "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    echo "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Thursday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Thursday' AND section='A' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
       echo "<td colspan='6'>NO data available</td>";
    }

  }
  else{
    echo  "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Friday</th>
  <?php 

  $sql ="SELECT subject_name,section,department FROM time_table WHERE day='Friday' AND section='A' AND semester='VI' AND department='AI&DS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            $sec = $row['section'];
            $dept = $row['department'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        echo "<td colspan='6'> NO data available</td>";
    }
  }
  else{
    echo "<td colspan='6'> NO data available</td>";
 }

  ?>
  
    
  
</tr>
<tr>

<?php
$sql ="SELECT subject_name,section,department,semester FROM time_table WHERE  section='A' AND semester='VI' AND department='AI&DS'";
$res = mysqli_query($conn,$sql);
$row  = mysqli_fetch_assoc($res);
$sem = $row['semester'];
$dept =  $row['department'];
$sec = $row['section'];

?>
    <td colspan='7'>
    <a href="<?php echo SITEURL;?>backend/delete-time-table.php?sec=<?php echo $sec;?>&dept=<?php echo $dept;?>" class="btn-del table"  >Delete Table</a>
    <a href="<?php echo SITEURL;?>backend/update-time-table.php?sec=<?php echo $sec;?>&dep=<?php echo urlencode($dept);?>&sem=<?php echo $sem ;?> " class="btn-update table" style='margin-left:50px;' >Update Table</a>

    </td>
    
</tr>



</table>
 -->




<!--------Time Table 2 ends---------------------------------->

<!-----TIME TABALE 3------>
   
<!-- <h3 class='table-class-title'>Class Time Table 3</h3>

<div class="table-wrapper" >
  
    <div>
        <p>Section -</p>
        <h4>C</h4>
    </div>
    <div>
        <p>Semster -</p>
        <h4>VI</h4>
    </div>
    <div>
        <p>Department -</p>
        <h4>CYS</h4>
    </div>
    
</div>

<table class="time-table" border>

<tr>
    <th>DAY</th>
    <th>1<sup>st</sup>Hour</th>
    <th>2<sup>nd</sup>Hour</th>
    <th>3<sup>rd</sup>Hour</th>
    <th>4<sup>th</sup>Hour</th>
    <th>5<sup>th</sup>Hour</th>
    <th>6<sup>th</sup>Hour</th>
</tr>

<tr>
<th>Monday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Monday' AND section='C' AND semester='VI' AND department='CYS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        echo "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    echo  "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Tuesday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Tuesday' AND section='C' AND semester='VI' AND department='CYS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        echo  "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    echo  "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Wednesday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Wednesday' AND section='C' AND semester='VI' AND department='CYS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        echo  "<td colspan='6'>NO data available</td>";
    }
  }
  else{
    echo "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Thursday</th>
  <?php 

  $sql ="SELECT subject_name FROM time_table WHERE day='Thursday' AND section='C' AND semester='VI' AND department='CYS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
       echo "<td colspan='6'>NO data available</td>";
    }

  }
  else{
    echo  "<td colspan='6'>NO data available</td>";
  }

  ?>
  
    
  
</tr>

<tr>
<th>Friday</th>
  <?php 

  $sql ="SELECT subject_name, section, department FROM time_table WHERE day='Friday' AND section='C' AND semester='VI' AND department='CYS'";
  $res = mysqli_query($conn,$sql);
  if($res==TRUE)
  {
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $sub_name = $row['subject_name'];
            $sec = $row['section'];
            $dept = $row['department'];

            ?>
            <td><?php echo $sub_name;?></td>
            <?php
        }
    }
    else{
        echo "<td colspan='6'> NO data available</td>";
    }
  }
  else{
    echo "<td colspan='6'> NO data available</td>";
 }

  ?>
  
    
  
</tr>
<tr>

<?php
$sql ="SELECT subject_name,section,department,semester FROM time_table WHERE  section='C' AND semester='VI' AND department='CYS'";
$res = mysqli_query($conn,$sql);
$row  = mysqli_fetch_assoc($res);
$sem = $row['semester'];
$dept =  $row['department'];
$sec = $row['section'];

?>
    <td colspan='7'>
    <a href="<?php echo SITEURL;?>backend/delete-time-table.php?sec=<?php echo $sec;?>&dept=<?php echo $dept;?>" class="btn-del table"  >Delete Table</a>
    <a href="<?php echo SITEURL;?>backend/update-time-table.php?sec=<?php echo $sec;?>&dep=<?php echo urlencode($dept);?>&sem=<?php echo $sem ;?> " class="btn-update table" style='margin-left:50px;' >Update Table</a>

    </td>
    
</tr>



</table> -->


 -->

<!--------Time Table 3 ends---------------------------------->





    
</body>

