<?php 

include('../config/constants.php');

if (isset($_POST['formData'])) {
    $formData = $_POST['formData'];

    foreach ($formData as $data) {
        $sem = $data['sem'];
        $sec = $data['sec'];
        $student_name = $data['name'];
        $faculty_name = $data['faculty_name'];
        $roll_no = $data['roll_no'];
        $day = $data['dy'];
        $date = $data['dt'];
        $hour = $data['hr'];
        $subject_name = $data['subject'];
        $department = $data['department'];
        $sta = isset($data['atd-status']) ? 1 : 0;
        $status = $sta ? 'Present' : 'Absent';

        // Check if the record already exists for the given date, hour, and roll_no
        $checkQuery = "SELECT * FROM attendance_tbl_$sem 
                       WHERE roll_no = '$roll_no' 
                         AND date = '$date' 
                         AND hour = '$hour'";

        $checkRes = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkRes) > 0) {
            // Record already exists
            $_SESSION['attendance-marked'] = "<div style='color:orange;text-align:center;font-size:22px;font-weight:600;'>Attendance already marked on $date during Hour $hour</div>";
        } else {
            // Insert only if no duplicate record is found
            $sql = "INSERT INTO attendance_tbl_$sem SET
                    roll_no = $roll_no,
                    student_name = '$student_name',
                    semester = '$sem',
                    department = '$department',
                    section = '$sec',
                    date = '$date',
                    day = '$day',
                    hour = $hour,
                    subject_name = '$subject_name',
                    attendance_status = '$status',
                    faculty_marked = '$faculty_name'";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                $_SESSION['attendance-marked'] = "<div style='color:green;text-align:center;font-size:20px'>Attendance marked successfully</div>";
            } else {
                $_SESSION['attendance-marked'] = "<div style='color:red;text-align:center;font-size:20px'>Unable to mark attendance</div>";
            }
        }
    }

    header("location:" . SITEURL . "frontend/faculty.php");
}
?>
