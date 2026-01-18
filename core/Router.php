<?php

$page = $_GET['stdnavbar'] ?? null;

switch ($page) {

    case 'Dashboard':
        header("Location: ../app/controllers/AttendanceController.php");
        break;

    case 'Medicals':
        header("Location: ../app/controllers/MedicalSubmitController.php");
        break;

    case 'Complaints':
        header("Location: ../app/controllers/ComplaintSendController.php");
        break;

    case 'News':
        header("Location: ../app/controllers/TecmisNewsController.php");
        break;
    
    case 'Profile':
        header("Location: ../temp/UI-Templets/Hasitha/Profile.php");
        break;

    case 'Logout':
        header("Location: ../public/index.php");
        break;

    default:
        echo "404 Not Found";
}

exit();

?>