<?php
    

    function getAllDepartments($conn) {
    $sql = "SELECT dep_id, dep_name, status FROM department";
    return mysqli_query($conn, $sql);
}

    function deleteDepartment($conn, $dep_id) {
    $sql = "UPDATE department SET status='INACTIVE' WHERE dep_id='$dep_id'";
    return mysqli_query($conn, $sql);

    }

    function reactiveDepartment($conn, $dep_id) {
    $sql = "UPDATE department SET status='ACTIVE' WHERE dep_id='$dep_id'";
    return mysqli_query($conn, $sql);

    }
//------------------------------------------------------

    function addDepartment($conn, $dep_name) {
    $status = 'ACTIVE';
    $sql = "INSERT INTO department (dep_name, status)
            VALUES ('$dep_name', '$status')";
    return mysqli_query($conn, $sql);
}

    function departmentExists($conn, $dep_name) {
    $sql = "SELECT dep_id 
            FROM department 
            WHERE dep_name='$dep_name' 
            AND status='ACTIVE'";
    $result = mysqli_query($conn, $sql);

    return mysqli_num_rows($result) > 0;
}



    


?>
