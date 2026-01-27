<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "student_attenance_management_system";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed");
}
