<?php include('./partials/front.php');
?>
<body>
<div class="adcontainer">
    <h1>DSU ADMIN PANNEL</h1>
</div>

<div class="header">
    <div class="head">
        <h2>Manage Admin Information</h2>
    </div>
    <div class="btn">
        <a href="add-admin.php" class="btn-add">ADD ADMIN</a>
    </div>
</div>
<?php

if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete']; // displaying session message
    unset($_SESSION['delete']); //removing session message
}

if(isset($_SESSION['update']))
{
    echo $_SESSION['update']; // displaying session message
    unset($_SESSION['update']); //removing session message
}
if(isset($_SESSION['add']))
{
    echo $_SESSION['add']; // displaying session message
    unset($_SESSION['add']); //removing session message
}
if(isset($_SESSION['change-pwd']))
{
    echo $_SESSION['change-pwd']; // displaying session message
    unset($_SESSION['change-pwd']); //removing session message
}
if(isset($_SESSION['user-not-found']))
{
    echo $_SESSION['user-not-found']; // displaying session message
    unset($_SESSION['user-not-found']); //removing session message
}

?>

<div class="std-container">




<?php


$sql = "SELECT * FROM admin";

$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);
$sno =1;
if($count > 0)
{
    while($row = mysqli_fetch_assoc($res))
    {
        $name = $row['user_name'];
        $email = $row['email'];
        $id =$row['id'];

?>
<table class="ad-tbl" >

<tr>
    <th>ADMIN NO.</th>
    <td>: <?php echo $sno++;?></td>
</tr>

<tr>
    <th>ADMIN NAME</th>
    <td>: <?php echo $name;?></td>
</tr>
<tr>
    <th>ADMIN Email-ID</th>
    <td>: <?php echo $email;?></td>
</tr>

<tr>
    <td>
    <br>
        <a href="<?php echo SITEURL;?>backend/update-admin.php?id=<?php echo $id;?>" class="btn-update"  style="display:inline-block;min-width:100px;margin-bottom:10px;">Update Admin </a>
    </td>
    <td>
    <br>
        <a href="<?php echo SITEURL;?>backend/changepd.php?id=<?php echo $id;?>" class="btn-change" style="display:inline-block;min-width:100px;margin-bottom:10px;"> Change password</a>
    </td>
</tr>

<tr>
    <td clospan="3">

        <a href="<?php echo SITEURL;?>backend/delete-admin.php?id=<?php echo $id;?>" class="btn-del"  style="display:inline-block;min-width:100px;margin-bottom:10px;;">Delete Admin </a>
     
    </td>
</tr>


</table>

  
<?php

}
}
?>

</div>

</body>