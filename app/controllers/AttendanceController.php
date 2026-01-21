
<?php
// AttendanceController.php
// get data from attendance model and give data to dashboard view

session_start();

require_once "../views/layouts/stdnavbar.php";
require_once "../models/Attendance.php";
require_once "../views/student/Dashboard.php";

stdnavbar();

if(isset($_SESSION["student"])) {

    $userId = $_SESSION["student"];

        if($userId != null){
            $rowdata = getUserById($userId);
            showfname($rowdata);
            $tablename =  findAttendanceTable($rowdata, $userId);
            showtablename($tablename);
            $attendance = getStdAttendence($tablename, $userId);
            showattendance($attendance);
            exit();
        }
  } 
  else {
    echo "No session data found.";
  }


?>