<?php include('./partials/front.php');

if(isset($_SESSION['login']))
{
    echo $_SESSION['login']; // displaying session message
    unset($_SESSION['login']); //removing session message
}


 $sql = "SELECT count(*) as Total_Students, SUM(CASE WHEN  hd='Day Scholar' THEN 1 ELSE 0 END) AS Day_Scholars_Count, SUM(CASE WHEN hd='Hostel' THEN 1 ELSE 0 END) AS Hostel_Count, SUM(CASE WHEN  gender='Male' THEN 1 ELSE 0 END) AS Male_Count, SUM(CASE WHEN  gender='Female' THEN 1 ELSE 0 END) AS Female_Count,
 SUM(CASE WHEN attendance_percentage>='80' THEN 1 ELSE 0 END) AS Students_Percentage, SUM(CASE WHEN attendance_percentage<'80' THEN 1 ELSE 0 END) AS Students_Percentage_less, COUNT( DISTINCT school) AS School, school
  FROM students group by school
 ";
 $res = mysqli_query($conn,$sql);
 $count=mysqli_num_rows($res);
 if($count>0)
 {
   $row = mysqli_fetch_assoc($res);
   $student_count = $row['Total_Students'];
   $day_scholar_count = $row['Day_Scholars_Count'];
   $hostler_count = $row['Hostel_Count'];
   $Male_Count = $row['Male_Count'];
   $female_count = $row['Female_Count'];
   $students_80 = $row['Students_Percentage'];
   $students_not_80 = $row['Students_Percentage_less'];
   $School = $row['School'];
   $scname = $row['school'];
  
 }






 $student_chart = []
?>

<?php
$color = ['#0097e6','#FD7272','#82589F','#F97F51','#5f27cd','#8395a7','#341f97','#ff9f43','#10ac84'];

$dataPoints = array(
	array("label"=> "Total Students", "y"=>$student_count,'color'=>$color[0]),
	array("label"=> "Day Scholar", "y"=> $day_scholar_count,'color'=>$color[1]),
	array("label"=> "Hostel Students", "y"=>$hostler_count,'color'=>$color[2]),

);

$data3 = array(
    array("label"=>"Students 80% and Above","y"=>$students_80,'color'=>$color[6]),
    array("label"=>"Students below 80%","y"=>$students_not_80,'color'=>$color[7]),
    
);

$data2 = array(
	array("label"=> "Male Students", "y"=>$Male_Count,'color'=>$color[7]),
	array("label"=> "Female Students", "y"=> $female_count,'color'=>$color[4]),
);

$data4 = array(
    array("label"=>"$scname","y"=>$School,'color'=>$color[8]),
  
    
    
);

?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	// theme: "light2",
    // height:590,
    // width:380,   
    backgroundColor:'transparent',
    labelFontSize:8 ,
	title: {
         text:"Day Scholar and Hosteler",
         fontFamily:'Arial',
        // fontStyle:'Bold',
         fontSize:10,
         fontWeight:900
		
	},
    axisX:{
        labelFontSize: 10, // Adjust font size here
        labelFontFamily:'Arial',
        labelFontStyle:'italic',
        labelFontWeight:900,
        gridThickness: 0 ,
        creditText: "" ,
        
   // Remove grid lines,
    },
	axisY: {
		suffix: "",
		// scaleBreaks: {
		// 	autoCalculate: true

		// }
        labelFontSize: 10,
        labelFontFamily:'Arial',
        // labelFontStyle:'italic',
        labelFontWeight:900, // Adjust font size here
        gridThickness: 0 ,
        // Remove grid lines,
        
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0\" Students\"",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000",
        indexLabelFontSize: 10, 
        indexLabelFontWeight: 900, 
        
		 dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
		
    
	}],
    creditText: "" // Remove CanvasJS watermark
});
chart.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	// theme: "light2",
    // height:200,
    // width:360,   
    backgroundColor:'transparent',
    labelFontSize:8 ,
	title: {
         text:"Overall Attendance %",
         fontFamily:'Arial',
        // fontStyle:'Bold',
         fontSize:10,
         fontWeight:900
		
	},
    axisX:{
        labelFontSize: 10, // Adjust font size here
        labelFontFamily:'Arial',
        labelFontStyle:'italic',
        labelFontWeight:900,
        gridThickness: 0 ,
        creditText: "" ,
        
   // Remove grid lines,
    },
	axisY: {
		suffix: "",
		// scaleBreaks: {
		// 	autoCalculate: true

		// }
        labelFontSize: 10,
        labelFontFamily:'Arial',
        // labelFontStyle:'italic',
        labelFontWeight:900, // Adjust font size here
        gridThickness: 0 ,
        // Remove grid lines,
        
	},
	data: [{
		type: "pie",
		yValueFormatString: "#,##0\" Students\"",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000",
        indexLabelFontSize: 10, 
        indexLabelFontWeight: 900, 
        
		 dataPoints: <?php echo json_encode($data3, JSON_NUMERIC_CHECK); ?>,
		
    
	}],
    creditText: "" // Remove CanvasJS watermark
});
chart2.render();

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	// theme: "light2",
    // height:200,
    // width:350,   
    backgroundColor:'transparent',
    labelFontSize:8 ,
	title: {
         text:"Male and Feamle Students",
         fontFamily:'Arial',
        // fontStyle:'Bold',
         fontSize:10,
         fontWeight:900
		
	},
    axisX:{
        labelFontSize: 10, // Adjust font size here
        labelFontFamily:'Arial',
        labelFontStyle:'italic',
        labelFontWeight:900,
        gridThickness: 0 ,
        creditText: "" ,
        
   // Remove grid lines,
    },
	axisY: {
		suffix: "",
		// scaleBreaks: {
		// 	autoCalculate: true

		// }
        labelFontSize: 10,
        labelFontFamily:'Arial',
        // labelFontStyle:'italic',
        labelFontWeight:900, // Adjust font size here
        gridThickness: 0 ,
        // Remove grid lines,
        
	},
	data: [{
		type: "stackedBar100",
		yValueFormatString: "#,##0\" Students\"",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000",
        indexLabelFontSize: 10, 
        indexLabelFontWeight: 900, 
        
		 dataPoints: <?php echo json_encode($data2, JSON_NUMERIC_CHECK); ?>,
		
    
	}],
    creditText: "" // Remove CanvasJS watermark
});
chart3.render();
 


var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	// theme: "light2",
    // height:300,
   // width:700,   
   backgroundColor:'transparent',
    labelFontSize:8 ,
	title: {
         text:"TOTAL NUMBER OF SCHOOLS",
         fontFamily:'Arial',
        // fontStyle:'Bold',
         fontSize:14,
         fontWeight:900
		
	},
    axisX:{
        labelFontSize: 10, // Adjust font size here
        labelFontFamily:'Arial',
        labelFontStyle:'italic',
        labelFontWeight:900,
        gridThickness: 0 ,
        creditText: "" ,
        
   // Remove grid lines,
    },
	axisY: {
		suffix: "",
		// scaleBreaks: {
		// 	autoCalculate: true

		// }
        labelFontSize: 10,
        labelFontFamily:'Arial',
        // labelFontStyle:'italic',
        labelFontWeight:900, // Adjust font size here
        gridThickness: 0 ,
        // Remove grid lines,
        
	},
	data: [{
		type: "stackedColumn100",
		yValueFormatString: "#,##0\" <?php echo $scname;?>\"",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000",
        indexLabelFontSize: 10, 
        indexLabelFontWeight: 900, 
        
		 dataPoints: <?php echo json_encode($data4, JSON_NUMERIC_CHECK); ?>,
		
    
	}],
    creditText: "" // Remove CanvasJS watermark
});
chart4.render();

}

</script>



<div class="adcontainer">
    <h1>WELCOME TO DHANALAKSHMI SRINIVASAN UNIVERSITY</h1>
  
    <!-- <h3>Students Dasboard</h3> -->

</div>
<!-- <div class="baner">
    <div class="div">
        <H3>ATTENDANCE MANAGEMENT SYSTEM DASHBOARD</H3>
        
    </div>

</div> -->
<!--  -->
<!-- <div id="chartContainer2" ></div> -->
<!-- <div id="chartContainer3" ></div> -->
<div class='student-dash-head'>
       <h1>STUDENT <span>DASHBOARD</span>📊</h1>

        <div class="dashboard-student">

                <div class='dashb one'>          
                    <div id="chartContainer" ></div>
                </div>
                
                <div class='dashb two'>
                    <div id="chartContainer2" ></div>
                
                </div>

                <div class='dashb three'>
                
                   <div id="chartContainer3" ></div>
                </div>

                <div class='dashb four'>
                <div id="chartContainer4" ></div>
                
                </div>
        </div>
</div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>