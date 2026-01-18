<?php
// model.php
// get data from the attendance tables and give data to attendancecontroller

function getUserById($userId) {

    if($userId == 1){
        return "Medical Submitted Successfully";
    }else{
        return null;
    }
}

?>