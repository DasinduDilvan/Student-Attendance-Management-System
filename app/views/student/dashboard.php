
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
                <th>Course ID</th>
                <th>Course Name</th>    
                <th>Lecturer</th>
                <th>Attendance</th>
                <th>Credits</th>
                <th>Lecture Hourse</th>
            </tr>';

    foreach($showFinalOutput as $coslist){
        //echo course_code, course_name, lecture_days, credits, lecturer_hours
        echo "<tr><td>".$coslist['course_code']."</td>";
        echo "<td>".$coslist['course_name']."</td>";
        echo "<td>".$coslist['lec_full_name']."</td>";
        echo "<td>".$coslist['atdcount']."/".$coslist['lecture_days']."</td>";
        echo "<td>".$coslist['credits']."</td>";
        echo "<td>".$coslist['lecturer_hours']."</td></tr>";
        }
        echo '</table>';
    } else {
        echo "<h2>No Attendance Records Found </h2>";
    }
}

?>

