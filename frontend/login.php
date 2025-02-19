


<?php include('../config/constants.php') ;
 if(isset($_SESSION['faculty-login']))
 {
     echo $_SESSION['faculty-login'];
     unset($_SESSION['faculty-login']);
 }
 if(isset($_SESSION['verify-login']))
 {
     echo $_SESSION['verify-login'];
     unset($_SESSION['verify-login']);
 }

    ?>
    <?php

if(isset($_POST['submit']))
{ 
  echo "selected";
    // $name = $_POST['name'];
   $email = $_POST['email'];
   $password=$_POST['password'];
   
   

   $sql="SELECT * FROM faculty_tbl WHERE  email ='$email'";
   $res = mysqli_query($conn,$sql);
   
  
   if($res==True AND $password=="123"){
       $_SESSION['faculty-login'] = "<div style='color:green;text-align:center;font-size:20px;font-weight:700;'>Login Successful</div>";
    //    $_SESSION['faculty-name'] = $name;
       $row = mysqli_fetch_assoc($res);
       $_SESSION['faculty-name']=$row['faculty_name'];
       $_SESSION['faculty-email'] = $email;
       $_SESSION['faculty-password'] = $password;
       header("location:".SITEURL."frontend/faculty.php");
   } 
   else{
       $_SESSION['faculty-login'] = "<div style='text-align:center;color:red;font-size:20px;position:fixed;top:40px;font-weight:700;'>Username or Password does not match</div>";
       header("location:".SITEURL."frontend/login.php");
   }
  
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
  <style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('images/back1.jpg');
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: red;
}

.login-container {
    background-color: #fffffff3;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 27px rgb(190, 78, 255);
    width: 25%;
    text-align: center;
    margin: auto;
   
}

.login-container .logo {
    width: 100px;
    height: 100px;
    margin-bottom: 20px;
}

.login-container h2 {
    margin-bottom: 10px;
}

.welcome-text {
    color: black;
}

.login-text {
    color: #8f36ef;
    text-decoration: underline;
}

.login-form input[type="text"],
.login-form input[type="password"] {
    width: 100%;
    margin: auto;
    font-size: 17px;
    margin-bottom: 15px;
    padding: 2px;
    border-radius: 4px;
    /* background-color: rgba(207, 207, 207, 0.915); */
    color: #000;
    border-color: #c76ef7;
   

}
.login-form{
    color:black;
    text-align:left;
    font-weight:700;
   
}

.login-form input.email{
    width: 100%;
    margin: auto;
    font-size: 17px;
    margin-bottom: 15px;
    padding: 2px;
    border-radius: 4px;
    /* background-color: rgba(207, 207, 207, 0.915); */
    color: #000;
    border:2px solid #c76ef7;
}
    


.login-form input[type="submit"] {
    width: 100%;
    padding: 5px;
    border: none;
    border-radius: 5px;
    background-color: #c76ef7;
    color: #000;
    cursor: pointer;
}

.login-form input[type="submit"]:hover {
    background-color: #8f36ef;
}
.login-form input{
    font-size:20px;
    outline:none;
   
}
/* Media Queries for responsiveness */
@media (max-width: 768px) {
    .login-container{
        width:50%;
        font-size:10px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"],
    .login-form input[type="submit"] {
        padding: 4px;
    }
    .login-form input.email,.login-form input[type="text"],
.login-form input[type="password"]{
        font-size:14px;
    }
}

@media (max-width: 480px) {
  
    .login-form input[type="text"],
    .login-form input[type="password"],
    .login-form input[type="submit"] {
        padding: 3px;
        margin-right: 0px;
        margin-left: 0px;
    }


    .login-container .logo {
        width: 80px;
        height: 80px;
    }
}
.login1{
   padding: 5px;
}


  </style>
</head>
<body>
   

      
      <div class="login-container">
        
        
        <img src="<?php echo SITEURL;?>frontend/images/ds.png" alt="" style="width: 100px; height: 100px;">
        
        
        <h2><span style="color: rgb(172, 72, 222);">>>> WELCOME <<<</span></h2>
        <h2><span class="login1" style="color: #000000;">Login</span></h2>
        
         <form  action="" method="POST" class="login-form"  enctype="multipart/form-data">
    
            <!-- NAME<br>
            <input type="text" name="name"> -->
            EMAIL<br>
            <input type="email" name="email" class="email">
            Password<br>
            <input type="password" name="password" >
          <input   type="submit" name="submit" class="login-button">
        </form>
      
    </div>
</body>
</html>
