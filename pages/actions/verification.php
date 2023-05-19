<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the submitted username and password
  $usernamee = $_POST["username"];
  $passwordd = $_POST["password"];
include('../../config.php');
   // Prepare the query to fetch the admin record based on the username
   $query = "SELECT * FROM admin WHERE username = ?";
   $stmt = $conn->prepare($query);
   $stmt->bind_param("s", $usernamee);
   $stmt->execute();
   $result = $stmt->get_result();
 
   if ($result->num_rows == 1) {
     // Admin record found, verify the password
     $row = $result->fetch_assoc();
     $hashedPassword = $row["password"];
 
     if (password_verify($passwordd, $hashedPassword)) {
       // Password matches, create a session and redirect to the dashboard
       $_SESSION["loggedin"] = true;
        $_SESSION["name"] = $admin["name"]; // Assuming $admin is an array containing the admin details fetched from the database
$_SESSION["user_level"] = $admin["user_level"];
       header("location: ../../");
       exit;
     } else {
       // Invalid password, show an error message and redirect to login page
       echo '<script>alert("Invalid password."); window.location.href = "../login.php";</script>';
     }
   } elseif ($result->num_rows == 0) {
     // Invalid username, show an error message and redirect to login page
     echo '<script>alert("Invalid username."); window.location.href = "../login.php";</script>';
   } else {
     // Multiple admin records found for the same username (debugging purposes)
     echo '<script>alert("Multiple records found for the same username. Please contact the administrator."); window.location.href = "../login.php";</script>';
   }
 
   // Close the database connection
   $stmt->close();
   $conn->close();
 }
 ?>