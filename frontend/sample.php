<?php
$checked = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/test.css">
</head>
<body>
    <div class="som" onclick="clickEvn()"></div>

 <div class="std-info">
    <img src="../images/img2.jpg" alt="">
    <div class="content">
        <h3>FULL NAME STUDENT</h3>
        <p>1521051147</p>
        
        <form action="" method="POST">
        <input type="checkbox"  checked value='1' name="atd">
        <input type="submit" name="submit" value="submit">
        </form>

        <?php

        if(isset($_POST['submit']))
        {
            $atd =isset( $_POST['atd'])? $_POST['atd']:0;
            
            $status = $atd?'Present':'Absent';
            echo $status;
        }

        ?>
            
    

                  
                
              
      
    </div>
 </div>

    
</body>

<script src="script.js"></script>
</html>

