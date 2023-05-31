<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usernamee = $_POST["username"];
  $passwordd = $_POST["password"];
  
include('../../config.php');
   $query = "SELECT * FROM admin WHERE username = ?";
   $stmt = $conn->prepare($query);
   $stmt->bind_param("s", $usernamee);
   $stmt->execute();
   $result = $stmt->get_result();
 
   if ($result->num_rows == 1) {
     $row = $result->fetch_assoc();
     $hashedPassword = $row["password"];
 
     if (password_verify($passwordd, $hashedPassword)) {
      $_SESSION["loggedin"] = true;
      $_SESSION["name"] = $admin["name"];
      $_SESSION["user_level"] = $admin["user_level"];
       header("location: ../../");
       exit;
     } else {
       echo '<script>alert("Invalid password."); window.location.href = "../login.php";</script>';
     }
   } elseif ($result->num_rows == 0) {
     echo '<script>alert("Invalid username."); window.location.href = "../login.php";</script>';
   } else {
     echo '<script>alert("Multiple records found for the same username. Please contact the administrator."); window.location.href = "../login.php";</script>';
   }

   $stmt->close();
   $conn->close();
 }
