
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

        //$rowdata = stu_fname, sem_id, level_id, dep_id
        //$tablename = dep_code
        //$attendance = stu_id, course_code, lecture_no, lecture_date, attendance
        //$coursedetails = course_code, course_name, lecture_days, credits, lecturer_hours
        //lecturersCouese = lec_id, course_code
        //lecturers = lec_id, lec_fName, lec_mName, lec_lName

        //$showFinalOutput = course_id, Course_name, lec_name, attendance, credits, lecturer_hours

        $showFinalOutput = [];
        foreach($coursedetails as $coslist){
          $temp = [];
          $temp['course_name'] = $coslist['course_name'];
          $temp['course_code'] = $coslist['course_code'];

              $atdcount = 0;
              foreach($attendance as $atdlist){
                  if($coslist['course_code'] == $atdlist['course_code']){
                      $atdcount += $atdlist['attendance'];
                  }
              }

              foreach($lecturersCouese as $cosdtls){
                if($coslist['course_code'] == $cosdtls['course_code']){  
                  foreach($lecturers as $lects){
                    if($cosdtls['lec_id'] == $lects['lec_id']){
                      $lecturerName['lec_full_name'] = $lects['lec_context']."".$lects['lec_fName']." ".$lects['lec_mName']." ".$lects['lec_lName'];
                      if($coslist['course_code'] == $cosdtls['course_code']){
                        $temp['lec_full_name'] = $lecturerName['lec_full_name'];
                      }
                    }
                  }
                }
              }

              $temp['atdcount'] = $atdcount;
              $temp['lecture_days'] = $coslist['lecture_days'];
              $temp['credits'] = $coslist['credits'];
              $temp['lecturer_hours'] = $coslist['lecturer_hours'];

          $showFinalOutput[] = $temp;
        }
        showattendance($showFinalOutput);

        exit();
    }
  } 
  else {
    echo "No session data found.";
  }

?>