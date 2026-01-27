<?php
// --- STATE ---
$department = $_POST['department'] ?? null;
$year = $_POST['year'] ?? null;
$semester = $_POST['semester'] ?? null;

// --- HELPERS ---
function showDepartment() {
    echo '
    <h2>Department</h2>
    <form method="post">
        <input type="text" name="department" list="deptList" placeholder="Type or select department" required>
        <datalist id="deptList">
            <option value="ICT">
            <option value="Engineering">
            <option value="Business Management">
        </datalist>
        <button type="submit">Save Department</button>
    </form>';
}

function showYear($department) {
    echo "
    <h2>Year</h2>
    <p><b>Department:</b> $department</p>
    <form method='post'>
        <input type='hidden' name='department' value='$department'>
        <select name='year' required>
            <option value=''>Select Year</option>
            <option value='1'>Year 1</option>
            <option value='2'>Year 2</option>
            <option value='3'>Year 3</option>
            <option value='4'>Year 4</option>
        </select>
        <button type='submit'>Save Year</button>
    </form>";
}

function showSemester($department, $year) {
    echo "
    <h2>Semester</h2>
    <p><b>Department:</b> $department</p>
    <p><b>Year:</b> $year</p>
    <form method='post'>
        <input type='hidden' name='department' value='$department'>
        <input type='hidden' name='year' value='$year'>
        <select name='semester' required>
            <option value=''>Select Semester</option>
            <option value='1'>Semester 1</option>
            <option value='2'>Semester 2</option>
        </select>
        <button type='submit'>Save Semester</button>
    </form>";
}

function showCourses($department, $year, $semester) {
    echo "
    <h2>Courses</h2>
    <p><b>Department:</b> $department</p>
    <p><b>Year:</b> $year</p>
    <p><b>Semester:</b> $semester</p>

    <form method='post'>
        <input type='hidden' name='department' value='$department'>
        <input type='hidden' name='year' value='$year'>
        <input type='hidden' name='semester' value='$semester'>

        <table id='courseTable'>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Hours</th>
                <th>Credits</th>
                <th>Lectures</th>
                <th></th>
            </tr>
            <tr>
                <td><input name='code[]' required></td>
                <td><input name='name[]' required></td>
                <td><input type='number' name='hours[]' required></td>
                <td><input type='number' step='0.5' name='credits[]' required></td>
                <td><input type='number' name='lectures[]' required></td>
                <td><button type='button' onclick='removeRow(this)'>X</button></td>
            </tr>
        </table>

        <button type='button' onclick='addRow()'>+ Add Course</button>
        <button type='submit' name='save_courses'>Save All Courses</button>
    </form>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Academic Setup</title>
<style>
body { font-family: Arial; background:#f4f6f9; padding:30px; }
h2 { margin-top:30px; }
table { width:100%; border-collapse:collapse; margin-top:10px; }
td, th { border:1px solid #ccc; padding:6px; }
input, select, button { padding:8px; margin-top:8px; }
</style>
</head>
<body>

<?php
// --- RENDER FLOW ---
if (!$department) {
    showDepartment();
} elseif (!$year) {
    showYear($department);
} elseif (!$semester) {
    showSemester($department, $year);
} else {
    showCourses($department, $year, $semester);
}
?>

<script>
function addRow() {
    let table = document.getElementById("courseTable");
    let row = table.rows[1].cloneNode(true);
    row.querySelectorAll("input").forEach(i => i.value = "");
    table.appendChild(row);
}

function removeRow(btn) {
    let row = btn.parentNode.parentNode;
    let table = document.getElementById("courseTable");
    if (table.rows.length > 2) row.remove();
}
</script>

</body>
</html>
