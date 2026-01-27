<?php
require_once __DIR__ . '/../models/DepartmentModel.php';
require_once __DIR__ . '/../config/database.php';

$department = [] ;

$departments = getDepartments($conn);

if (isset($_POST['save'])) {
    $department = trim($_POST['department']);
    if ($department !== '') {
        addDepartmentIfNotExists($conn, $department);
        $_SESSION['department'] = $department;
    }
    header("Location: index.php?page=batch");
    exit;
}

require_once __DIR__ . '/../views/departmentView.php';
