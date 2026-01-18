

<?php
// model.php
// get data from the attendance tables and give data to attendancecontroller

function getUserById($userId) {
    
	//require_once("config.php");

    //$userId = mysqli_real_escape_string($conn, $userId);

    //$sql = "SELECT username FROM users WHERE id = $userId";
	
    //$result = mysqli_query($conn, $sql);

    //if ($row = mysqli_fetch_assoc($result)) {
    //    return $row['username'];
    //} else {
    //    return null;
    //}

    if($userId == 1){
        return "Dasindu Dilvan";
    }else{
        return null;
    }
}

?>