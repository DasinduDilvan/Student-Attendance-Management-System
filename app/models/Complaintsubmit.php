

<?php
// model.php
// get data from the attendance tables and give data to attendancecontroller
require_once __DIR__ . '/../../config/config.php';  
global $conn;

function getUserById($userId) {
    
	require_once __DIR__ . '/../../config/config.php';
    global $conn;

    $sql = "SELECT stu_fname, stu_reg_num FROM student WHERE stu_id = '$userId'";
    $result = mysqli_query($conn, $sql);

    $std_data = [];

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $std_data[] = $row;
        }
        return $std_data;
      } else {
        return null;
      }
      
}

?>