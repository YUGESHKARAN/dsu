<?php include('./partials/front.php');


if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "SELECT * FROM subject_tbl WHERE id =$id";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $semester = $row['semester'];
    $department = $row['department'];
    $sub_id  = $row['sub_id'];
    $subject = $row['subject_name'];
    $sub_type= $row['sub_type'];

}

if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}


if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $sub_id = $_POST['sub_id'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $sub_type =$_POST['sub_type'];

    $sql2 = "UPDATE subject_tbl SET
    semester = '$semester',
    department = '$department',
    sub_id = '$sub_id',
    sub_type = '$sub_type',
    subject_name = '$subject'

    WHERE id=$id
    ";
    $res2 = mysqli_query($conn,$sql2);
    if($res2==TRUE)
    {
        $_SESSION['update']="<div class='success' style='color:green;text-align:center;font-size:20px;'>Subject updated successfully!</div>";
        header("location:".SITEURL."backend/subject.php");
    }
    else{
        $_SESSION['update']="<div class='fail' style='color:red;text-align:center;font-size:20px;'>Unable to update subject details</div>";
        header("location:".SITEURL."backend/update-subject.php");
    }
}
?>
<div class="adcontainer">
    <h1 style="color:#2980b9">UPDATE SUBJECT DETAILS</h1>
</div>
<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data" >
      <table class="std-add-tbl" >

      <tr>
        <td>SUBJECT NAME</td>
        <td>
            : <input type="text" name="subject" value="<?php echo $subject;?>" required>
        </td>
      </tr>

      <tr>
        <td>SUBJECT ID</td>
        <td>
            : <input type="text" name="sub_id" value="<?php echo $sub_id;?>" required>
        </td>
      </tr>

      <tr>
        <td>DEPARTMENT</td>
        <td>
            : <input type="text" name="department" value="<?php echo $department;?>" required>
        </td>
      </tr>
      <tr>
        <td>SUBJECT TYPE</td>
        <td>
          : <select name="sub_type" >
            <option <?php if($sub_type=='Theory')   {echo "selected";}?> value="Theory">Theory</option>
            <option <?php if($sub_type=='Practical'){echo "selected";}?> value="Practical">Practical</option>
            <option <?php if($sub_type=='Student Development'){echo "selected";}?> value="Student Development">Student Development</option>
            <option <?php if($sub_type=='Other'){echo "selected";}?> value="Other">Other</option>
          </select>
        </td>
      </tr>

     

      <tr>
        <td>SEMESTER</td>
        <td>
            : <select name="semester" required>
                <option <?php if($semester=="I")    { echo "selected";}?> value="I">I</option>
                <option <?php if($semester=="II")   { echo "selected";}?> value="II">II</option>
                <option <?php if($semester=="III")  { echo "selected";}?> value="III">III</option>
                <option <?php if($semester=="IV")   { echo "selected";}?> value="IV">IV</option>
                <option <?php if($semester=="V")    { echo "selected";}?> value="V">V</option>
                <option <?php if($semester=="VI")   { echo "selected";}?> value="VI">VI</option>
                <option <?php if($semester=="VII")  { echo "selected";}?> value="VII">VII</option>
                <option <?php if($semester=="VIII") { echo "selected";}?> value="VIII">VIII</option>
              </select>
        </td>
      </tr>
      <tr>
        <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id;?>">
           <input type="submit" name="submit" value="Update Subject" class="btn-update">
        </td>
      </tr>
      </table>
    </form>