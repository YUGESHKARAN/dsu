<?php 
include('./partials/front.php');

?>



<div class="adcontainer">
    <h1>DSU STUDENT ATTENDANCE PANNEL</h1>
</div>


<div class="header">
    <div class="head">
        <h2>Manage Student Attendance</h2>
    </div>
    <div class="btn">
        <a href="#" class="btn-add">VIEW ONLY</a>
    </div>
</div>

<div class="wrapper">
    <div class="adcontainer" >
        <h3 style="color:blue; font-size:29px;">Student Attendance Information</h3>
    </div>

   <?php
   $se=["VI","II","III","IV","V","VI","VII","VIII"];
   $i=0;
   while($i<1)
   { 
    $sem=$se[$i];
      ?>
      <h3 style="text-align:ceneter;color:#8c7ae6;margin-top:30px;">STUDENT ATTENDANCE FOR <span style="color:#341f97;">SEMESTER <?php echo $sem;?></span></h3>
       <div class="std-container">
        
        <?php
        
        $sql1 = "SELECT count(attendance_tbl_$sem.attendance_status) as totl_hour,attendance_tbl_$sem.roll_no,S.name, S.department,S.semester,S.photo,S.status, S.section from attendance_tbl_$sem  INNER JOIN students as S on S.roll_no = attendance_tbl_$sem.roll_no  GROUP BY attendance_tbl_$sem.roll_no,S.name,S.department,S.semester,S.photo,S.status,S.section ORDER BY S.roll_no";
        $res1 = mysqli_query($conn,$sql1);
        $count1 = mysqli_num_rows($res1);
        if($count1>1){
            while($row1= mysqli_fetch_assoc($res1))
            {
                $totl_hour = $row1['totl_hour'];
                $roll_no = $row1['roll_no'];
                $name = $row1['name'];
                $department = $row1['department'];
                $semester = $row1['semester'];
                $image = $row1['photo'];
                $status = $row1['status'];
                $section = $row1['section'];
                $student_id = "chart-".$roll_no;
               
                ?>
              
                <div class="std-card atd" style="background:#F8EFBA;">
                  <div class="top">

                        <?php

                            if($image==""){
                            echo "<div class='fail'>Image not available</div>";
                            }
                            else{

                            ?>
                            <img src="<?php echo SITEURL;?>images/student/<?php echo $image;?>" alt="">

                            <?php
                            }

                            ?>     

                        <div class="name"><?php echo $name ;?><span style="font-size:12px;" ><?php if($status=="Active"){echo "<p style='color:green'> *$status</p>";} else{echo "<p style='color:red'> *$status</p>";}?></span></div>

                    </div>

                    <div class="botm">
                        <div class="tbl atd">
                         
                           <div class="divcol">
                                  <div>
                                        <div class="bold">ROLL NO.</div>
                                        <div>: <?php echo $roll_no ;?></div>
                                    </div>

                                    <div>
                                        <div class="bold">SEMESTER</div>
                                        <div>: <?php echo $semester ;?></div>
                                    </div>
                           </div>

                           <div class="divcol">
                               <div>
                                        <div class="bold">DEPARTMENT</div>
                                        <div>: <?php echo $department ;?></div>
                               </div>

                                <div>
                                        <div class="bold">SECTION</div>
                                        <div>: <?php echo $section ;?></div>
                                </div>
                           </div>
                        </div>
                        
                        <div class="at-percentage">
                           <div class="value" >
                            <h3 style="color:rgb(0, 0, 97);">ATTENDANCE STATUS</h3>
                            <?php
                            $sql2 = "SELECT count(attendance_status) as totl_hour_present, roll_no FROM attendance_tbl_$sem WHERE attendance_status='Present' AND roll_no = $roll_no  GROUP BY roll_no";
                            $res = mysqli_query($conn,$sql2);
                            $row2 = mysqli_fetch_assoc($res);
                            $cnt = mysqli_num_rows($res);
                            $present_hour =($cnt>0)?$row2['totl_hour_present']:0;
                            $per = ($present_hour/$totl_hour) * 100;
                            $percentage = number_format($per,2);
                             
                            ?>
                     
                        </div>
                              <div style="width: 60%; margin: auto;">
                                <canvas id="<?php echo $student_id;?>" style="width:100%;margin:auto;cursor:pointer;"></canvas>
                              </div>
                     </div>
                </div>
                    <script>
                        // Get the percentage value from PHP
                        var percentage = <?php echo $percentage; ?>;

                        // Calculate the remaining percentage
                        var remaining = 100 - percentage;

                        // Data for the pie chart
                        var data = {
                            labels: ['PRESENT - <?php echo $percentage;?>%', 'ABSENT - <?php echo 100-$percentage;?>%'],
                            datasets: [{
                                data: [percentage, remaining],
                                backgroundColor: ['blue', 'red'], // Green and Yellow colors
                                borderWidth:1,
                                borderColor:'black'
                            }]
                        };

                        // Options for the pie chart
                        var options = {
                            responsive: true,
                            
                            plugins: {

                                label: function(context) {
                                            var label = context.label || '';
                                           
                                            return label;
                                        }
                            }
                        };

                        
                        // Create the pie chart
                        var ctx = document.getElementById('<?php echo $student_id;?>').getContext('2d');
                        var myPieChart = new Chart(ctx, {
                            type: 'pie',
                            data: data,
                            options: options
                        });
                    </script>
                </div>
                <?php

            }

        } 
        else{
            echo "<div style='text-align:center;font-size:20px;color:red;width:100%;'><center>NO RECORD FOUND</center></div>";
        }
        ?>
    </div>
      <?php

    $i++;
   }
   ?>
</div>



