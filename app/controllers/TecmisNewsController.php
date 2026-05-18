
<?php
// TecmisNewsController.php
// get data from the TecmisNews model and give data to TecmisNews view

session_start();

require_once "../views/layouts/stdnavbar.php";
require_once "../models/TecmisNews.php";
require_once "../views/student/TecmisNews.php";

stdnavbar();

// Output session variables that were set on previous page
if(isset($_SESSION["student"])) {

    $userId = $_SESSION["student"];

        if($userId != null){
            $username = getUserById($userId);

            showResult($username);
            exit();
        }

  } 
  else {
    echo "No session data found.";
  }

?>