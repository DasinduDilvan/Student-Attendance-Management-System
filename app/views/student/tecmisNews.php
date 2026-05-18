

<?php
// TecmisNews view.php
// communicate with MedicalSubmitController to display medical submission for students

/*function showForm() {
    echo '

        <h1>Student Medicals</h1>

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
        echo "<h2>Status: TECMIS Scrap Error </h2>";
    }
}

?>