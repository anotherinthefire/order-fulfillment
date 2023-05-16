<?php
// if (session_status() == PHP_SESSION_NONE) {
//   session_start();
// }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// else{
//     echo("successful");
// }

$host = 'localhost';
$dbname = 'sia';
$user = 'root';
$pass = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
