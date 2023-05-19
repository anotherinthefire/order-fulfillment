<?php
include('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the submitted color value
  $color = $_POST["color"];

  // Check if the color already exists
  $checkQuery = "SELECT * FROM color WHERE color = '$color'";
  $checkResult = $conn->query($checkQuery);

  if ($checkResult->num_rows > 0) {
    echo 'exists';
  } else {
    // Insert the new color into the color table
    $insertQuery = "INSERT INTO color (color) VALUES ('$color')";

    if ($conn->query($insertQuery) === TRUE) {
      echo 'success';
    } else {
      echo 'error';
    }
  }
}

// Close the database connection
$conn->close();
?>
