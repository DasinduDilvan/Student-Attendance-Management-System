
<?php
// ComplaintSendController.php
// get data from attendance model and give data to dashboard view

session_start();

require_once "../views/layouts/stdnavbar.php";
require_once "../models/ComplaintSubmit.php";
require_once "../views/student/ComplaintSubmit.php";

stdnavbar();

// Output session variables that were set on previous page
if(isset($_SESSION["student"])) {

    $userId = $_SESSION["student"];

        if($userId != null){
            $username = getUserById($userId);
            showForm();
            showResult($username);
            exit();
        }

  } 
  else {
    echo "No session data found.";
  }

?>