<?PHP

$username = "root";
$servername = "localhost";
$password = "";
$database = "TECSAMS";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>