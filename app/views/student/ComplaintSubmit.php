
<?php
// ComplaintSubmit.php
// communicate with ComplaintSendController to display complaint submission for students

function showForm() {
    echo '

        <h1>Student Complaints</h1>

    <hr>
        <form method="post">
            <label>Complain Type:</label>
            <select name="complaint_type" required>
                <option value="">-- Select Complaint Type --</option>
                <option value="Hostel">Hostel</option>
                <option value="Academics">Academics</option>
                <option value="Transport">Transport</option>
                <option value="Other">Other</option>
            </select>
            <br><br>
            <label>Subject:</label>
            <input type="text" name="complaint_subject" required>
            <br><br>
            <label>Complaint Description:</label>
            <textarea name="complaint_description" rows="4" cols="50" required></textarea>
            <br><br>
            <button type="submit">Send</button>
        </form>
        <hr>
    ';
}

function showResult($username) {
    if ($username) {  //stu_fname, stu_reg_num
        foreach($username as $user){
            echo "<h2> Hi," . $user['stu_fname'].' - '.$user['stu_reg_num'] . "</h2>";
        }
    } else {
        echo "<h2>Status: Complaint Send Error </h2>";
    }
}

?>