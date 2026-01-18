
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

function showResult($username) {
    if ($username) {
        echo "<h2>User Found: $username </h2>";
    } else {
        echo "<h2>User Not Found </h2>";
    }
}

?>