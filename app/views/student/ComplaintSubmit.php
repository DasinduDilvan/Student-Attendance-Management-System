
<?php
// ComplaintSubmit.php
// communicate with ComplaintSendController to display complaint submission for students

/*function showForm() {
    echo '

        <h1>Student Complaints</h1>

    <hr>
        <form method="post">
            <label>Enter 1:</label>
            <input type="number" name="user_id" required>
            <button type="submit">Send</button>
        </form>
        <hr>
    ';
}*/

function showResult($username) {
    if ($username) {
        echo "<h2>Status: $username </h2>";
    } else {
        echo "<h2>Status: Complaint Send Error </h2>";
    }
}

?>