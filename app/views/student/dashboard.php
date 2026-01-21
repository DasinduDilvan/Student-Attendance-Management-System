
<?php
// Dashboard view Student Attendance 
// communicate with AttendanceController to display attendance for students

/*function showForm() {
    echo '

        <h1> Attendance Dashboard</h1>

    <hr>
        <form method="post">
            <label>User ID:</label>
            <input type="number" name="user_id" required>
            <button type="submit">Find User</button>
        </form>
        <hr>
    ';
}*/

function showfname($rowdata) {
    if ($rowdata) {
        echo "<h2>Student First Name : " . $rowdata["fName"]. "</h2>";
        //echo "<br>Student Dep Lvl Sem : " . $username. "<br>";
        //fName, Sem_ID, Level_ID, Dep_ID echo First name, Semester ID, Level ID, Department ID
        //echo "Semester ID: " . $username["Sem_ID"]. " <br>Level ID: " . $username["Level_ID"]. "<br>Department ID: " . $username["Dep_ID"]. "<br>";

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

function showattendance($attendance) {
    if ($attendance) {
    echo '
        <table border="1">
    <tr>
        <th>Course ID</th>
        <th>Lecture Day</th>
        <th>Date</th>
        <th>Attendance</th>
    </tr>';

    foreach ($attendance as $row) { ?>
        <tr>
            <td><?= $row['Course_ID'] ?></td>
            <td><?= $row['Lecture_Day'] ?></td>
            <td><?= $row['Date'] ?></td>
            <td><?= $row['attendance'] ?></td>
        </tr>
    <?php }
    echo '
    </table>';
    } else {
        echo "<h2>No Attendance Records Found </h2>";
    }
}

?>

