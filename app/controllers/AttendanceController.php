
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
        $coursedetails = getCourseDetails($rowdata, $userId);

        $lecturersCouese = getLecturerCourse();
        $lecturers = getLecturers();

        $lectueresAndCourses = [];
        foreach($coursedetails as $leccos){
          foreach($lecturersCouese as $cosdtls){
            if($leccos['course_code'] == $cosdtls['course_code']){  
              foreach($lecturers as $lects){
                if($cosdtls['lec_id'] == $lects['lec_id']){
                  $lecturerName['lec_full_name'] = $lects['lec_fName']." ".$lects['lec_mName']." ".$lects['lec_lName'];
                  echo $lecturerName['lec_full_name']."<br>";
                  $lectueresAndCourses[] = $lects['lec_id'];
                  $lectueresAndCourses[] = $lecturerName['lec_full_name'];
                  $lectueresAndCourses[] = $cosdtls['course_code'];
                  //echo $lectueresAndCourses['lec_id']."-";
                  //echo $lectueresAndCourses['lec_full_name']."-";
                  //echo $lectueresAndCourses['lec_cos']."<br>";
                }
              }
            }
          }
        }
        foreach($lectueresAndCourses as $aaaa){
          //echo $aaaa['lec_id']."-";
          //echo $aaaa['lec_full_name']."-";
          //echo $aaaa['lec_cos']."<br>";
        }

        showattendance($attendance, $coursedetails,$lectueresAndCourses);

        exit();
    }
  } 
  else {
    echo "No session data found.";
  }

?>