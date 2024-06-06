<?php include('../config/constants.php'); ?>

<?php include('verify-login.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


  
</head>
<body>
<nav>
    <div class="logo">
        <img src="../images/dsu_logo.png" alt="">
        <h3>DHANALAKSHMI SRINIVASAN <br>UNIVERSITY </h3>
    </div>

    <div class="menu" onclick="menubar()"><svg xmlns="http://www.w3.org/2000/svg" height="30" fill="#fff" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></div>
    <div class="nav-links" id="menu">
        <ul>
            <li class="close" onclick="closebar()"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></li>
            <li><a href="<?php echo SITEURL?>backend/index.php">Home</a></li>
            <li><a href="<?php echo SITEURL?>backend/admin.php">Admin</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a href="<?php echo SITEURL?>backend/subject.php">Subjects</a></li>
            <li><a href="<?php echo SITEURL?>backend/faculty.php">Faculties</a></li>
            <li><a href="<?php echo SITEURL;?>backend/time-table.php">Time Table</a></li>
            <li><a href="<?php echo SITEURL;?>backend/attendance.php">Attendnance</a></li>
            <li><a href="log-out.php">logout</a></li>
        </ul>
    </div>
</nav>
<button class="scroll" id="btntop" onclick="Topscroll()">Top</button>
      <script>
    function Topscroll(){
        document.body.scrollTop = 0; // For Safari
       document.documentElement.scrollTop = 0;
    }
      </script>
<script>

    var nav = document.getElementById("menu");
    function menubar(){
        nav.style.right="-20px";
    }

    function closebar(){
        nav.style.right="-300px";
    }
  
</script>