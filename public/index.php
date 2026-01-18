<?PHP 
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST['user_id'];

    if($userId != null){
        $_SESSION["student"] = $userId;
        header("Location: ../app/controllers/AttendanceController.php?user_id=" . $userId);
        exit();
    }
}

echo "
<html>
<head>
    <title>My PHP Application</title>
</head>
<body>
    <h1>Welcome to My PHP Application</h1>
    <p>This is the main entry point of the application.</p>
    <form method='post'>
        <label>User ID:</label>
        <input type='number' name='user_id' required>
        <button type='submit'>Find User</button>
</body>
</html>
";


?>