
<?php
// model.php
// get data from the attendance tables and give data to attendancecontroller
require_once __DIR__ . '/../../config/config.php';  
global $conn;

function getUserById($userId) {
    
	require_once __DIR__ . '/../../config/config.php';
    global $conn;

    $sql = "SELECT fName, Sem_ID, Level_ID, Dep_ID FROM student WHERE S_ID = '$userId'";
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

    $DepartmentCode = $row['Dep_ID'];

    $finddep = "SELECT Dep_Code FROM department WHERE Dep_ID = '$DepartmentCode'";  

    $depresult = mysqli_query($conn, $finddep);

    if (mysqli_num_rows($depresult) > 0) {
        while($depcode = mysqli_fetch_assoc($depresult)) {
            $DeplvlSem = $depcode['Dep_Code'] . $row['Level_ID'] . $row['Sem_ID'];
            return $DeplvlSem;
        }
      } else {
        return null;
      }
}

function getStdAttendence($DeplvlSem, $userId) {
    $attendanceTable = $DeplvlSem;
    $stdid = $userId;

    require_once __DIR__ . '/../../config/config.php';
    global $conn;

    $sqlq = "SELECT * FROM $attendanceTable WHERE S_ID = '$stdid'";
    $attendance = mysqli_query($conn, $sqlq);
        
    $atdcube = [];
    $seenCourses = [];

    if (mysqli_num_rows($attendance) > 0) {
      while ($row = mysqli_fetch_assoc($attendance)) {
  
          if (!in_array($row['Course_ID'], $seenCourses)) {
              $atdcube[] = $row;
              $seenCourses[] = $row['Course_ID'];
              $atdcube['attendance'] = $atdcube['attendance'] + 1;
          }
  
      }
    return $atdcube;

    } else {
      echo "0 results in attendance table.";
    }
}

?>

