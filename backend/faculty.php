<?php include('./partials/front.php');

?>


<div class="adcontainer">
    <h1>DSU FACULTIES CONTROL PANNEL</h1>
</div>

<?php 

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

if(isset($_SESSION['remove']))
{
    echo $_SESSION['remove'];
    unset($_SESSION['remove']);
}

if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
if(isset($_SESSION['failed-remove']))
{
    echo $_SESSION['failed-remove'];
    unset($_SESSION['failed-remove']);
}
if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
?>

<div class="header">
    <div class="head">
        <h2>Manage Faculty Data</h2>
    </div>
    <div class="btn">
        <a href="add-faculty.php" class="btn-add">ADD FACULTY</a>
    </div>
</div>
<div class="wrapper">
    <div class="adcontainer" >
        <h3 style="color:blue; font-size:29px;">FACULTY DETAILS</h3>
        
    </div>
 </div>



 <div class="std-container faculty">

 <?php
 $sql = "SELECT * FROM faculty_tbl";
 $res = mysqli_query($conn,$sql);
 $count = mysqli_num_rows($res);
 if($count>0)
 {
    while($row = mysqli_fetch_assoc($res))
    {  
        $id = $row['id'];
        $name = $row['faculty_name'];
        $email = $row['email'];
        $sub_id = $row['sub_id'];
        $department = $row['department'];
        $semester = $row['semester'];
        $sec = $row['section'];
        $image = $row['photo'];
  ?>
    <div class="std-card faculty" >
     <div class="top">

     <?php 

     if($image!="")
     {
        ?>
        <img style="height:100px;" src="<?php echo SITEURL;?>images/faculty/<?php echo $image;?>" >
        <?php
     }
     else{
          echo "<div class='fail'>Image Not Found</div>";
        
     }
     ?>
        
        <div class="name"><h5><?php echo $name;?></h5></div>
     </div>

     <div class="botm">
        <table class="tbl">
        <tr>
            <td class="bold">EAMIL ID</td>
            <td>
                : <?php echo $email;?>
            </td>
        </tr>
        <tr>
            <td class="bold">DEPARTMENT</td>
            <td>
               : <?php echo $department;?>
            </td>
        </tr>
        <tr>
            <td class="bold">SUBJECT_ID</td>
            <td>
               : <?php echo $sub_id;?>
            </td>
        </tr>
        <tr>
            <td class="bold">SEMSETER</td>
            <td>
             : <?php echo $semester;?>
            </td>
        </tr>
        <tr>
            <td class="bold">SECTION</td>
            <td>
               : <?php echo $sec;?>
            </td>
        </tr>
        <tr style="margin-top:30px;">
                            <td><a href="<?php echo SITEURL;?>backend/update-faculty.php?id=<?php echo $id;?>" class="btn-update" style="display:inline-block;margin-top:20px;">Update</a></td>
                            <td><a href="<?php echo SITEURL;?>backend/delete-faculty.php?id=<?php echo $id;?>&image_name=<?php echo $image;?>" class="btn-del"  style="display:inline-block;margin-top:20px;">Delete</a></td>
                        </tr>
        </table>

     </div>
    </div>
    <?php

}
 }
 else{
    echo "<div  style='text-align:center;font-size:27px;color:green;width:100%;'>No Faculty details available !</div>";
 }
 


 ?>

   
 </div>