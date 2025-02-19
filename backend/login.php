
<?php include("../config/constants.php");
if(isset($_SESSION['login-check']))
{
    echo $_SESSION['login-check']; // displaying session message
    unset($_SESSION['login-check']); //removing session message
}
?>





<link rel="stylesheet" href="../css/admin.css">
<style>

    .log-head{
        text-align:center;
    }
    .std-add-tbl.login tr td,th{
        padding-top:40px;
    }
    .std-add-tbl.login tr{}
   
    .std-add-tbl.login tr td{
        margin-left:20px;

    }
    .btn-update.log{
        width:60px;
        cursor: pointer;
        margin:auto;
        background:#3498db;
    }
    
</style>
<div class="login-container">

<h1 style="text-align:center;margin-top:50px">WELCOME TO DSU ADMIN PANEL LOGIN PAGE</h1>

<div class="log-box">
<h1 class="log-head">LOGIN PAGE</h1>

 

<form action="" method="POST" enctype="multipart/form-data">
    

<table class="std-add-tbl login">

<tr>
    <th>
        USER NAME
    </th>
    <td>
       : <input type="text" name="name" required>
      
    </td>
   
</tr>
<tr>
<br>
    <th>
        PASSWORD
    </th>
    <td>
        : <input type="password" name="password" required>
    </td>
</tr>

<tr>
    <td rowspan="2">
        <br>
         <input type="submit" name="submit" value="Login" class="btn-update log"> 
    </td>
</tr>
</table>
</form>

<?php

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE user_name ='$name' AND password ='$password'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($res==TRUE)
    {
        if($count==1){

            $_SESSION['login'] = "<div style='color:green;text-align:center;font-size:20px;'>Login Successfull! </div>";
            $_SESSION['user'] = $name;
            header("location:".SITEURL."backend/index.php");
        }
    }
    else{
        $_SESSION['login'] = "<div style='color:red;text-align:center;font-size:20px;'>User Name or Password does not match</div>";
        header("location:".SITEURL."backend/login.php");
    }
}

?>


</div>

</div>