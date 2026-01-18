
<?php
// AttendanceController.php
// get data from attendance model and give data to dashboard view

session_start();

require_once "../views/layouts/stdnavbar.php";
require_once "../models/Attendance.php";
require_once "../views/student/Dashboard.php";

stdnavbar();

// Output session variables that were set on previous page
if(isset($_SESSION["student"])) {

    $userId = $_SESSION["student"];

        if($userId != null){
            $username = getUserById($userId);

            showResult($username);
            exit();
        }

  } 
  else {
    echo "No session data found.";
  }


?>