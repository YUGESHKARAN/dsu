<?php 

session_start();


//create constants 
define('SITEURL','http://localhost/dsu/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','dsu');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

?>