<?php include('./partials/front.php');

?>


<div class="adcontainer">
    <h1>DSU SUBJECTS CONTROL PANEL</h1>
</div>


<div class="header">
    <div class="head">
        <h2>Manage Subject Data</h2>
    </div>
    <div class="btn">
        <a href="add-subject.php" class="btn-add">ADD SUBJECT</a>
    </div>
</div>
<div class="wrapper">
    <div class="adcontainer" >
        <h3 style="color:blue; font-size:29px;">SUBJECT DETAILS</h3>
        
    </div>
 </div>
<?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
?>
 <div class="std-container">

 <?php


$sql = "SELECT * FROM subject_tbl";
$res = mysqli_query($conn,$sql);
if($res==TRUE){
    $count = mysqli_num_rows($res);
    if($count>0){
       
        while($row = mysqli_fetch_assoc($res))
        {   $id = $row['id'];
            $semester = $row['semester'];
            $department = $row['department'];
            $subject = $row['subject_name'];
            $sub_id = $row['sub_id'];
            $sub_type = $row['sub_type'];
?>
    <div class="std-card" style="background:#f7f1e3; box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 1); position:relative;">
       <h4 style="text-align:center;color:#474787;"> <?php echo $subject;?></h4>
          <div class="sub-cont">
    
           <div>
          
            <p>Sub_id</p>
            <h5><?php echo $sub_id;?></h5>
           </div>

           <div>
            <p>Sub_Type</p>
            <h6><?php echo $sub_type;?></h6>
           </div>
             <div>
                <p>Semester</p>
                 <h5><?php echo $semester;?></h5>
             </div>
             <div>
                <p>Department</p>
                <h5><?php echo $department;?></h5>
             </div>
          </div>
          <div class="sub-btn">
          <a href="<?php echo SITEURL;?>backend/update-subject.php?id=<?php echo $id;?>" class='btn-update sub'>Update Details</a>
          <a href="<?php echo SITEURL;?>backend/delete-subject.php?id=<?php echo $id;?>" class='btn-del sub'>Delete Details</a>
          </div>

    </div>

    <?php   
         }
    }
    else{
        echo "<div  style='text-align:center;font-size:27px;color:green;width:100%;'>No Subject details available !</div>";
     }
}


?>
 </div>




