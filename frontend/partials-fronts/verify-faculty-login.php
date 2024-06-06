<?php 
if(!isset($_SESSION['faculty-name']))
{
    $_SESSION['verify-login'] = "<div style='color:red;text-align:center;font-size:20px;position:fixed;top:40px;font-weight:700;'>Login to access the details</div>";
    header("location:".SITEURL."frontend/login.php");
}
?>