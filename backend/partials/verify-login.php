<?php


if(!isset($_SESSION['user']))
{
    $_SESSION['login-check'] = "<div style='color:red;text-align:center;font-size:20px;'>Login to access admin panel.</div>";
    header("location:".SITEURL."backend/login.php");
}