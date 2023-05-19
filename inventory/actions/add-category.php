<?php
include('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the submitted category value
  $category = $_POST["category"];

  // Check if the category already exists
  $checkQuery = "SELECT * FROM category WHERE category = '$category'";
  $checkResult = $conn->query($checkQuery);

  if ($checkResult->num_rows > 0) {
    echo 'exists';
  } else {
    // Insert the new category into the category table
    $insertQuery = "INSERT INTO category (category) VALUES ('$category')";

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
