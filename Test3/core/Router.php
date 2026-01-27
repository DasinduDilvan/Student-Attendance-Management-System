<?php
$page = $_GET['page'] ?? 'main';  // default to main page

switch ($page) {
    case 'main':
        require_once __DIR__ . '/../controllers/MainController.php';
        break;
    case 'department':
        require_once __DIR__ . '/../controllers/DepartmentController.php';
        break;
    case 'batch':
        require_once __DIR__ . '/../controllers/BatchController.php';
        break;
    default:
        echo "404 Page Not Found";
}
