<?php
// model.php
// get data from the attendance tables and give data to attendancecontroller

function getUserById($userId) {

    if($userId == 1){
        return "News Retrieved Successfully";
    }else{
        return null;
    }
}

?>