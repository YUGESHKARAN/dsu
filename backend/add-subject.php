<?php include('./partials/front.php');

?>

<?php

if(isset($_POST['submit']))
{
    $subject = $_POST['subject'];
    $sub_id = $_POST['sub_id'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $sub_type = $_POST['sub_type'];
    $sql = "INSERT INTO subject_tbl SET
    semester = '$semester',
    department = '$department',
    sub_type = '$sub_type',
    sub_id = '$sub_id',
    subject_name = '$subject'
    ";

    $res = mysqli_query($conn,$sql);
    if($res==TRUE)
    {
        $_SESSION['add'] = "<div class='success' style='color:green;font-size:20px;text-align:center;'>Subject added successfully!</div>";
        header("location:".SITEURL."backend/subject.php");
    }
    else{
        $_SESSION['add'] = "<div class='fail' style='color:red;font-size:20px;text-align:center;'>Unable to add subject</div>";
        header("location:".SITEURL."backend/subject.php");
    }
}

?>
<div class="adcontainer">
    <h1 style="color:#2980b9">ADD SUBJECT DETAILS</h1>
</div>
<div class="form-wrap">
    <form action="" method="POST" enctype="multipart/form-data" >
      <table class="std-add-tbl" >

      <tr>
        <td>SUBJECT NAME</td>
        <td>
            : <input type="text" name="subject" required>
        </td>
      </tr>

      <tr>
        <td>SUBJECT ID</td>
        <td>
            : <input type="text" name="sub_id" required>
        </td>
      </tr>

      <tr>
        <td>SUBJECT TYPE</td>
        <td>
          : <select name="sub_type" >
            <option value="Theory">Theory</option>
            <option value="Practical">Practical</option>
            <option value="Student Development">Student Development</option>
            <option value="Other">Other</option>
          </select>
        </td>
      </tr>

      <tr>
        <td>DEPARTMENT</td>
        <td>
            : <input type="text" name="department" required>
        </td>
      </tr>

     

      <tr>
        <td>SEMESTER</td>
        <td>
            : <select name="semester" required>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
                <option value="VII">VII</option>
                <option value="VIII">VIII</option>
              </select>
        </td>
      </tr>
      <tr>
        <td colspan="2">
           <input type="submit" name="submit" value="Add Subject" class="btn-update">
        </td>
      </tr>
      </table>
    </form>


</div>
