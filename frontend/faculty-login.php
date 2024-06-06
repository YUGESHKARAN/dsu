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

if(isset($_POST['submit']))
{ 
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password=$_POST['password'];
   
   

   $sql="SELECT * FROM faculty_tbl WHERE  email ='$email'";
   $res = mysqli_query($conn,$sql);
   
  
   if($res==True AND $password=="123"){
       $_SESSION['faculty-login'] = "<div style='text-align:center;color:green;font-size:20px;'>Login Successful</div>";
       $_SESSION['faculty-name'] = $name;
       $_SESSION['faculty-email'] = $email;
       $_SESSION['faculty-password'] = $password;
       header("location:".SITEURL."frontend/faculty.php");
   } 
   else{
       $_SESSION['faculty-login'] = "<div style='text-align:center;color:red;font-size:20px;'>Username or Password does not match</div>";
       header("location:".SITEURL."frontend/faculty-login.php");
   }
  
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      
      form{
        width: 25%;
      }
        .faculty-login{
        font-family: 'poppins';
        background:transparent;
        box-shadow: #e056fd 0px 22px 70px 4px;
        color:#be2edd;
        font-weight:700;
      
       }
        .faculty-login input{
        border-radius: 4px;
        background: transparent;
        border:1px solid #686de0 ;
        outline:none;
        width: 100%;
     
        
}
        .faculty-login .submit{
           background:#b94dd1;
           color:#fff;
           width: 30%;
        }

        .cont{
            width:70%;
            margin:auto;
        }
        body{
            background: #dff9fb;
        }
        @media(max-width:900px){
            form{
        width: 40%;
      }
            .cont{
            width:100%;
            margin:auto;
        }
            .faculty-login .submit{
           
           width: 100%;
        
        }
        }
    </style>
</head>
<body >
    <form action="" method="POST" class="faculty-login" enctype="multipart/form-data" style="margin:200px auto auto auto; border:1px solid black; padding:30px; padding-right:50px;border-radius:10px;">
       <div class="cont">
       Name <br>
        <input type="text" name="name">
        <br><br>
        Email <br>
        <input type="text" name="email">
        <br><br>
        Password  <br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" class="submit" name="submit" >
       </div>
    </form>
</body>
</html>