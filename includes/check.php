<?php
function checkLoginStatus() {
  // Start the session
  session_start();

  // Check if the user is not logged in
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirect to the login page
    header("location: pages/login.php");
    exit;
  }
}
?>
