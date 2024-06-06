<?php 

include('../config/constants.php');
include('./partials-fronts/verify-faculty-login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frontend.css">
    <title>CLASS LINK</title>
    <link rel="shortcut icon" href="images/ds.png" type="image/x-icon">
</head>
<body>
    <nav >
        <div class="navlogo">
          <img src="images/ds.png"  class="d-inline-block align-top" alt=""s>
            <h1 class="logo">Dhanalakshmi Srinivasan University</h1>
         </div>
         <li class="menu" onclick="menubar()" ><svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></li>
         <div class="navbarbuttons" id="menu">
            
            <ul class="ulist" >
                <li class="close" onclick="closebar()"><svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></li>
                <li><a href="">Home</a></li>
                <li><a href="<?php echo SITEURL;?>frontend/faculty.php">Attendance</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="<?php echo SITEURL;?>frontend/log-out.php">Logout</a></li>
            </ul>


          </div>
      
 </nav>
</nav>