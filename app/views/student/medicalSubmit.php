

<?php
// view for student medical submission
// communicate with MedicalSubmitController to display medical submission for students

function showform($absentdata) {
    //course_code as select, lec_day as selection, medical_reason as text
    echo '
        <h1>Student Medicals</h1>
        <form method="post">
            <label>Select Absent Course date Course:</label>
            <select name="course" required>
            <option value="">-- Select --</option>';

            foreach($absentdata as $absents){ 
                echo '<option value="'.$absents['lecture_no'].'in'.$absents['course_code'].'">'.$absents['course_name'].'-'.$absents['course_code'].'-'.$absents['lecture_no'].'|'.$absents['lecture_date'].'</option>';
            }

            echo '
            </select>
            <br><br>
            <label>Medical Reason:</label>
            <input type="text" name="medical_reason" required></textarea>
            <br><br>
            <label>Attach Medical Image:</label>
            <input type="file" name="document" accept="image/*" required>
            <br><br>
            <button type="submit">Submit Medical</button>
        </form><hr>';
}

function showResult($username) {
    if ($username) {
        echo "<h2>Status: $username </h2>";
    } else {
        echo "<h2>Status: Medical Send Error </h2>";
    }
}

?>