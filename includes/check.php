<?php
function checkLoginStatus() {
  session_start();
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: pages/login.php");
    exit;
  }
}
?>
