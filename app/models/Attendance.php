
<?php
// model.php
// get data from the attendance tables and give data to attendancecontroller
require_once __DIR__ . '/../../config/config.php';  
global $conn;

function getUserById($userId) {
    
	require_once __DIR__ . '/../../config/config.php';
    global $conn;

    $sql = "SELECT stu_fname, sem_id, level_id, dep_id FROM student WHERE stu_id = '$userId'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
      } else {
        return null;
      }
      
}

function findAttendanceTable($row, $userId) {

    require_once __DIR__ . '/../../config/config.php';
    global $conn;

    $DepartmentCode = $row['dep_id'];

    $finddep = "SELECT dep_code FROM department WHERE dep_id = '$DepartmentCode'";  

    $depresult = mysqli_query($conn, $finddep);

    if (mysqli_num_rows($depresult) > 0) {
        while($depcode = mysqli_fetch_assoc($depresult)) {
            $DeplvlSem = $depcode['dep_code'] . $row['level_id'] . $row['sem_id'];
            return $DeplvlSem;
        }
      } else {
        return null;
      }
}

function getStdAttendence($DeplvlSem, $userId) {
    $attendanceTable = "attendance_".$DeplvlSem;
    $stdid = $userId;

    require_once __DIR__ . '/../../config/config.php';
    global $conn;

    $sqlq = "SELECT * FROM $attendanceTable WHERE stu_id = '$stdid'";
    $attendance = mysqli_query($conn, $sqlq);
        
    $atdcube = [];
    $seenCourses = [];

    if (mysqli_num_rows($attendance) > 0) {
      while ($row = mysqli_fetch_assoc($attendance)) {
              $atdcube[] = $row;
      }
    return $atdcube;

    } else {
      echo "0 results in attendance table.";
    }
}

function getCourseDetails($row, $userId) {
    require_once __DIR__ . '/../../config/config.php';
    global $conn;

    $sql = "SELECT course_code, course_name, lecture_days, credits, lecturer_hours FROM course WHERE sem_id = '".$row['sem_id']."' AND level_id = '".$row['level_id']."' AND dep_id = '".$row['dep_id']."'";
    $result = mysqli_query($conn, $sql);

    $courses = [];

    if (mysqli_num_rows($result) > 0) {
        while($course = mysqli_fetch_assoc($result)) {
            $courses[] = $course;
        }
      return $courses;
      } else {
        return null;
      }
}

function   getLecturerCourse(){
  require_once __DIR__ . '/../../config/config.php';
  global $conn;

  $sql = "SELECT * FROM lecturer_course";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($lecturer_course = mysqli_fetch_assoc($result)) {
        $lecturers_course[] = $lecturer_course;
    }
    return $lecturers_course;
  } else {
    return null;
  }
}

function getLecturers(){
  require_once __DIR__ . '/../../config/config.php';
  global $conn;

  $sql = "SELECT lec_id, lec_context, lec_fName, lec_mName, lec_lName FROM lecturer";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($lecturer = mysqli_fetch_assoc($result)) {
        $lecturers[] = $lecturer;
    }
    return $lecturers;
  } else {
    return null;
  }

}

?>

