<?php
function getDepartments($conn) {
    $result = mysqli_query($conn, "SELECT * FROM department ORDER BY dep_name");
    $departments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $departments[] = $row;
    }
    return $departments;
}

function addDepartmentIfNotExists($conn, $name) {
    $name = mysqli_real_escape_string($conn, $name);
    $check = mysqli_query($conn, "SELECT * FROM department WHERE dep_name='$name'");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "INSERT INTO department(dep_name, status) VALUES('$name', 'ACTIVE')");
    }
}

function getDepartmentId($conn, $name) {
    $name = mysqli_real_escape_string($conn, $name);
    $result = mysqli_query($conn, "SELECT dep_id FROM department WHERE dep_name='$name'");
    $row = mysqli_fetch_assoc($result);
    return $row['dep_id'] ?? null;
}
