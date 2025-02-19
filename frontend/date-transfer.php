<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

include('../config/constants.php') ;


 
   if(isset($_POST['date']))
   {
    $date = $_POST['date'];
    $_SESSION['selected-date'] = $date;
    header("location:".SITEURL."frontend/faculty.php");
   }

   

  
   
   
   ?>
   


</body>
</html>

