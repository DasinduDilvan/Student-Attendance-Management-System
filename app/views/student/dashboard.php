
<?php
// Dashboard view Student Attendance 
// communicate with AttendanceController to display attendance for students

function showfname($rowdata) {
    if ($rowdata) {
        echo "<h2>Student First Name : " . $rowdata["stu_fname"]. "</h2>";
    } else {
        echo "<h2>User Not Found </h2>";
    }
}

function showtablename($attandancetable) {
    if ($attandancetable) {
        echo "<h2>Attendance Table : " . $attandancetable. "</h2>";
    } else {
        echo "<h2>Attendance Table Not Found </h2>";
    }
}

function showattendance($showFinalOutput) {
    if ($showFinalOutput) {
    echo '
        <table border="1">
            <tr>
                <th><a style="font-weight: bold; font-size: 22px;">Course</a></th>
                <th><a style="font-weight: bold; font-size: 22px;">Attendance</a></th>
                <th><a style="font-weight: bold; font-size: 22px;">Credits</a></th>
                <th><a style="font-weight: bold; font-size: 22px;">Lecture Hourse</a></th>
            </tr>';

    foreach($showFinalOutput as $coslist){
        //echo course_code, course_name, lecture_days, credits, lecturer_hours
        echo "<tr><td><a style='font-weight: bold; font-size: 22px; '>";
        echo $coslist['course_name']."</a><br>".$coslist['course_code']." by ".$coslist['lec_full_name']."</td>";
        echo "<td><a style='font-weight: bold; font-size: 22px;'>".$coslist['atdcount']."/".$coslist['lecture_days']."</a></td>";
        echo "<td><a style='font-weight: bold; font-size: 22px;'>".$coslist['credits']."</a></td>";
        echo "<td><a style='font-weight: bold; font-size: 22px;'>".$coslist['lecturer_hours']."</a></td></tr>";
        }
        echo '</table>';
    } else {
        echo "<h2>No Attendance Records Found </h2>";
    }
}

?>

