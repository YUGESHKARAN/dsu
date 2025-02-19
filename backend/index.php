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


 $sql2 = "SELECT 
    theory_counts.theory,
    theory_counts.Practical,
    theory_counts.sd,
    overall_counts.Faculty,
    overall_counts.subject,
    department_count.total_departments
FROM 
    (SELECT 
        COUNT(DISTINCT CASE WHEN S.sub_type = 'Theory' THEN F.faculty_name ELSE NULL END) AS theory,
        COUNT(DISTINCT CASE WHEN S.sub_type = 'Practical' THEN F.faculty_name ELSE NULL END) AS Practical,
        COUNT(DISTINCT CASE WHEN S.sub_type = 'Student Development' THEN F.faculty_name ELSE NULL END) AS sd
     FROM 
        faculty_tbl AS F
     JOIN 
        subject_tbl AS S 
     ON 
        S.sub_id = F.sub_id) AS theory_counts,
    (SELECT 
        COUNT(DISTINCT F.faculty_name) AS Faculty,
        COUNT(DISTINCT S.subject_name) AS subject 
     FROM 
        faculty_tbl AS F 
     JOIN 
        subject_tbl AS S 
     ON 
        S.sub_id = F.sub_id) AS overall_counts,
    (SELECT 
        COUNT(DISTINCT department) AS total_departments
     FROM 
        faculty_tbl) AS department_count

";

$res2 = mysqli_query($conn,$sql2);
$count2=mysqli_num_rows($res2);

if($count2>0)
{
    $row2 = mysqli_fetch_assoc($res2);
    $theory = $row2['theory'];
    $practical = $row2['Practical'];
    $std_development = $row2 ['sd'];
    $total_faculty = $row2['Faculty'];
    $total_subjects = $row2['subject'];
    $total_departments = $row2['total_departments'];
    
}


$sql3 = "SELECT 
    COUNT(DISTINCT CASE WHEN S.sub_type = 'Theory' THEN F.faculty_name ELSE NULL END) AS theory,
    COUNT(DISTINCT CASE WHEN S.sub_type = 'Practical' THEN F.faculty_name ELSE NULL END) AS Practical,
    COUNT(DISTINCT CASE WHEN S.sub_type = 'Student Development' THEN F.faculty_name ELSE NULL END) AS sd
FROM 
    faculty_tbl AS F
JOIN 
    subject_tbl AS S 
ON 
    S.sub_id = F.sub_id
    " ;

$res3=mysqli_query($conn,$sql3);
$count3=mysqli_num_rows($res3);

if($count3>0)
{
    $row3= mysqli_fetch_assoc($res3);
    $theory_count = $row3['theory'];
    $prac_count = $row3['Practical'];
    $sd = $row3['sd'];

}


$sql4 = "SELECT count(distinct department) as department, count( DISTINCT subject_name) as sub_count from subject_tbl GROUP BY department";
$res4=mysqli_query($conn,$sql4);
$count4 = mysqli_num_rows($res4);
if($count>0)
{
    $row4 = mysqli_fetch_assoc($res4);
    $department = $row4['department'];
    $sub_count = $row4['sub_count'];
}




?>

<?php
$color = ['#0097e6','#ff3838','#82589F','#F97F51','#5f27cd','#ff9f1a','#341f97','#ff9f43','#10ac84'];

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

$data5 = array(
	array("label"=> "Theory Faculties", "y"=>$theory,'color'=>$color[7]),
	array("label"=> "Practical Faculties", "y"=>$practical,'color'=>$color[4]),
	array("label"=> "Student Development ", "y"=>$std_development,'color'=>$color[0]),

);

$data6 = array(
	array("label"=> "Total Faculties", "y"=>$total_faculty,'color'=>$color[2]),
	array("label"=> "Total Subjects", "y"=>$total_subjects,'color'=>$color[5]),
	array("label"=> "Total Departments", "y"=>$total_departments,'color'=>$color[1]),

);
$data7 = array(
	array("label"=> "Theory Subjects","symbol"=>"Theory Subjects", "y"=>$theory_count,'color'=>$color[2]),
	array("label"=> "Practical Subjects","symbol"=>"Practical Subjects", "y"=>$prac_count,'color'=>$color[5]),
	array("label"=> "Student Departments","symbol"=>"Skill Subjects", "y"=>$sd,'color'=>$color[1]),

);

$data8 = array(
	array("label"=> "Department","y"=>$department,'color'=>$color[2]),
	array("label"=> "Subject Count", "y"=>$sub_count,'color'=>$color[5])

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
         text:"Male and Female Students",
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



var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	// theme: "light2",
    // height:300,
   // width:700,   
   backgroundColor:'transparent',
    labelFontSize:8, 
	title: {
         text:"FACULTIES COUNT",
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
		type: "stackedBar",
		yValueFormatString: "#,##0\" <?php echo "Faculties" ;?>\"",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000",
        indexLabelFontSize: 10, 
        indexLabelFontWeight: 900, 
        
		 dataPoints: <?php echo json_encode($data5, JSON_NUMERIC_CHECK); ?>,
		
    
	}],
    creditText: "" // Remove CanvasJS watermark
});
chart5.render();

var chart6 = new CanvasJS.Chart("chartContainer6", {
	animationEnabled: true,
	// theme: "light2",
    // height:300,
   // width:700,   
   backgroundColor:'transparent',
    labelFontSize:8 , 
	title: {
         text:"FACULTIES & SUBJECTS & DEPARTMENTS",
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
		type: "stackedColumn100",
		yValueFormatString: "#,##0\" <?php echo "count";?>\"",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000",
        indexLabelFontSize: 10, 
        indexLabelFontWeight: 900, 
        
		 dataPoints: <?php echo json_encode($data6, JSON_NUMERIC_CHECK); ?>,
		
    
	}],
    creditText: "" // Remove CanvasJS watermark
});
chart6.render();

var chart7 = new CanvasJS.Chart("chartContainer7", {
	animationEnabled: true,
	// theme: "light2",
    // height:300,
   // width:700,   
   backgroundColor:'transparent',
    labelFontSize:8 , 
	title: {
         text:"SUBJECTS COUNT",
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
		type: "doughnut",
		yValueFormatString: "#,##\"\"",
		indexLabel: "{symbol} - {y}",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000",
        indexLabelFontSize: 10, 
        indexLabelFontWeight: 900, 
        innerRadius:"50%",
        
		 dataPoints: <?php echo json_encode($data7, JSON_NUMERIC_CHECK); ?>,
		
    
	}],
    creditText: "" // Remove CanvasJS watermark
});
chart7.render();


var chart8 = new CanvasJS.Chart("chartContainer8", {
	animationEnabled: true,
	// theme: "light2",
    // height:300,
   // width:700,   
   backgroundColor:'transparent',
    labelFontSize:8 , 
	title: {
         text:"DEPARTMENTS AND SUBJECTS",
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
		type: "area",
		yValueFormatString: "#,##0\"\"",
		indexLabel: "{y}",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#000",
        indexLabelFontSize: 10, 
        indexLabelFontWeight: 900, 
        
		 dataPoints: <?php echo json_encode($data8, JSON_NUMERIC_CHECK); ?>,
		
    
	}],
    creditText: "" // Remove CanvasJS watermark
});
chart8.render();

}


</script>
<div class="adcontainer">
    <h1>WELCOME TO ADMIN INTERFACE</h1>
  
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



<?php include('./dashboard-students.php'); ?>
<?php include('./dashboard-faculty.php'); ?>
<?php include('./dashboard-subjects.php'); ?>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>