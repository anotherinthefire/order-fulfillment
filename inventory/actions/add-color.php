<?php
include('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $color = $_POST["color"];

  $checkQuery = "SELECT * FROM color WHERE color = '$color'";
  $checkResult = $conn->query($checkQuery);

  if ($checkResult->num_rows > 0) {
    echo 'exists';
  } else {
    $insertQuery = "INSERT INTO color (color) VALUES ('$color')";

    if ($conn->query($insertQuery) === TRUE) {
      echo 'success';
    } else {
      echo 'error';
    }
  }
}

$conn->close();
?>
