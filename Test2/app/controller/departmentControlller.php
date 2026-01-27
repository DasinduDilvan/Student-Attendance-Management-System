<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../model/departmentModel.php';





//Fetch Data
$departments = [];

$result = getAllDepartments($conn);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $departments[] = $row;
    }
}

/* DELETE ACTION */
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $dep_id = $_GET['id'];

    deleteDepartment($conn, $dep_id);

    header("Location: index.php?page=department");
    exit();
}

/* REACTIVATION */
if (isset($_GET['action']) && $_GET['action'] == 'reactive') {
    $dep_id = $_GET['id'];

    reactiveDepartment($conn, $dep_id);

    header("Location: index.php?page=department");
    exit();
}

/* SAVE OR REDIRECT */
if (isset($_POST['save_department'])) {

    $dep_name = trim($_POST['department']);

    if (!empty($dep_name)) {

        if (!departmentExists($conn, $dep_name)) {
            // Department does NOT exist → save
            addDepartment($conn, $dep_name);
        }

        // Exists OR newly saved → go to batch page
        header("Location: index.php?page=batch");
        exit();
    }
}







