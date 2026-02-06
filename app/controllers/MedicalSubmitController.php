
<?php
// ComplaintSendController.php
// get data from attendance model and give data to dashboard view

session_start();

require_once "../views/layouts/stdnavbar.php";
require_once "../models/MedicalSubmit.php";
require_once "../views/student/MedicalSubmit.php";

stdnavbar();

// Output session variables that were set on previous page


if(isset($_SESSION["student"])) {

    $userId = $_SESSION["student"];

        if($userId != null){
          $rowdata = getUserById($userId);
          //$rowdata = stu_fname, sem_id, level_id, dep_id
          $tablename =  findAttendanceTable($rowdata, $userId);
          //$tablename = dep_code
          $attendance = getStdAttendence($tablename, $userId);
          //$attendance = stu_id, course_code, lecture_no, lecture_date, attendance
          $coursedetails = getCourseDetails($rowdata, $userId);
          //$coursedetails = course_code, course_name, lecture_days, credits, lecturer_hours

          //echo $attendance 's course_code, course_name, lecture_no, lecture_date if the ['attendance'] is '0' ;
          foreach($attendance as $atd){
            $temp = [];
            if($atd['attendance'] == 0){
              //find course name from coursedetails
              $course_name = "";
              foreach($coursedetails as $cos){
                if($cos['course_code'] == $atd['course_code']){
                  $course_name = $cos['course_name'];
                }
              }
              //echo $course_name . " - " . $atd['course_code'] . " - " . $atd['lecture_no'] . " - " . $atd['lecture_date'] . "<br>";
              $temp['course_name'] = $course_name;
              $temp['course_code'] = $atd['course_code'];
              $temp['lecture_no'] = $atd['lecture_no'];
              $temp['lecture_date'] = $atd['lecture_date'];
              $temp['attendance'] = $atd['attendance'];
              $absentdata[] = $temp;
            }
          }
          
          showform($absentdata);

          exit();
        }

  } 
  else {
    echo "No session data found.";
  }

if(isset($_POST['submitMedical'])) {
    $userId = $_SESSION["student"];
    $absent = $_POST['absent_course_date'];
    $reason = $_POST['medical_reason'];
    $documentPath = uploadDocument($_FILES['document']);

    if ($documentPath) {
        $result = submitMedicalLeave($userId, $absent, $reason, $documentPath);
        if ($result) {
            echo "Medical leave submitted successfully.";
        } else {
            echo "Failed to submit medical leave.";
        }
    } else {
        echo "Failed to upload document.";
    }
}

?>