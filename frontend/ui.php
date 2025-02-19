<?php include('../config/constants.php') ;
include('./partials-fronts/verify-faculty-login.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <button ><a href="<?php echo SITEURL;?>frontend/log-out.php">Logout </a></button>
    <h1 style="color:blue;text-align:center">Sample User Interface</h1>
    <?php
    if(isset($_SESSION['attendance-marked']))
    {
        echo $_SESSION['attendance-marked'];
        unset($_SESSION['attendance-marked']);
       
        
    }
    if(isset($_SESSION['faculty-login']))
    {
        echo $_SESSION['faculty-login'];
        unset($_SESSION['faculty-login']);
        
    }
    $faculty_name = $_SESSION['faculty-name'];
    $faculty_email = $_SESSION['faculty-email'];
     ?>
    <div class="container">
        <?php
        $firstdate = new DateTime("first day of this month");
        $currentdate = new DateTime();
        ?>
        <div class="rowcontainer">

        <?php
          while($firstdate<=$currentdate)
           {
            ?>
            <div class="contan" >
                <div style="font-weight:700"><?php echo  $firstdate->format('d-M-Y');?></div>
                <div><?php echo $firstdate->format('l'); ?></div>
            </div>
            <?php
        
        
         $firstdate->modify('+1 day');
        }
        ?>
        </div>
        <?php

        $condate =  $currentdate->format('d-M-Y');
        
        $day =$currentdate->format('l');
      
        ?>
       

<form  method="POST" id="newform" class="attendance-form date" enctype="multipart/form-data">
    <?php

        $firstdate = new DateTime("first day of this month");
        $currentdate = new DateTime();
        
    ?>
     <select name="date" id="date">
   
            <?php
                while($firstdate<=$currentdate)
        {
                $first =  $firstdate->format('d-M-Y');
          
            ?>
       
            <option <?php if($condate == $first){echo "selected";}?> value="<?php echo $first;?>"><?php echo $first;?></option>
    
            <?php
        
         $firstdate->modify('+1 day');
        }
        ?>
    </select>

    <input type="submit" id="submit" name="submit" value="submit" class="btn-update"> 

</form>


      

<form  method="POST" id="form" class="attendance-form" enctype="multipart/form-data" >

  
        <select id="date" style="display:none;" >
           
        <?php
        $firstdate = new DateTime("first day of this month");
        $currentdate = new DateTime();
        
        ?>
   
            <?php

           if(isset($_SESSION['selected-date']))
           {
            $cudate =  $_SESSION['selected-date'];
            $date =  DateTime::createFromFormat('d-M-Y', $cudate);
            $cuday = $date->format('l');
           

           }
           else{
             $cudate =  $currentdate->format('d-M-Y');
             $cuday = $currentdate->format('l');
           }
                while($firstdate<=$currentdate)
             {

            ?>
            <option <?php if(isset($_SESSION['selected-date']) ){if($cudate==$firstdate->format('d-M-Y') ){ echo "selected";}} elseif($condate== $firstdate->format('d-M-Y')){echo "selected";}?>  value="<?php $firstdate->format('d-M-Y');?>">
              <?php echo  $firstdate->format('d-M-Y');?>
                
          </option>
            <?php
        
         $firstdate->modify('+1 day');
        }
        ?>
        </select>

        <div class="date">
            <p><?php echo $cudate; ?> </p>
        </div>
             
            <select name="day" id="day" style="display:none">
                 <option <?php if(isset($_SESSION['selected-date'])) {if($cuday=="Monday")   {echo "selected";}} elseif($day=="Monday")   {echo "selected"; } ?>  value="Monday">Monday</option>
                 <option <?php if(isset($_SESSION['selected-date'])) {if($cuday=="Tuesday")  {echo "selected";}} elseif($day=="Tuesday")  {echo "selected";} ?>  value="Tuesday">Tuesday</option>
                 <option <?php if(isset($_SESSION['selected-date'])) {if($cuday=="Wednesday"){echo "selected";}} elseif($day=="Wednesday"){echo "selected";} ?>  value="Wednesday">Wednesday</option>
                 <option <?php if(isset($_SESSION['selected-date'])) {if($cuday=="Thursday") {echo "selected";}} elseif($day=="Thursday") {echo "selected";} ?>  value="Thursday">Thursday</option>
                 <option <?php if(isset($_SESSION['selected-date'])) {if($cuday=="Friday")   {echo "selected";}} elseif($day=="Friday")   {echo "selected";} ?>  value="Friday">Friday</option>
                 <option <?php if(isset($_SESSION['selected-date'])) {if($cuday=="Saturday" || $cuday=="Sunday") {echo "selected";}} elseif($day=="Saturday" || $day=="Sunday")   {echo "selected";} ?>  value="None">None</option>
            </select>
            <div class="date">
            <p><?php if($cuday=="Sunday"){echo "None";}else{echo $cuday;} ?> </p>
        </div>
         

            <select name="hour" id="hour">
                <option value="1">1<sup>st</sup> HOUR</option>
                <option value="2">2<sup>nd</sup> HOUR</option>
                <option value="3">3<sup>rd</sup> HOUR</option>
                <option value="4">4<sup>th</sup> HOUR</option>
                <option value="5">5<sup>th</sup> HOUR</option>
                <option value="6">6<sup>th</sup> HOUR</option>        
            </select>
            <input type="hidden" name="dt" id="dt" value="<?php echo $cudate;?>">
            <input type="hidden" name="fname" id="fname" value="<?php echo $faculty_name;?>">
            <input type="hidden" name="femail" id="femail" value="<?php echo $faculty_email;?>">
            
            <input type="submit" id="submit" name="submit" value="submit">
        </form>
        




        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script.js"></script>
        
        
    </div>
    


  

    
</body>
</html>