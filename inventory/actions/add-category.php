<?php
include('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];

  $checkQuery = "SELECT * FROM category WHERE category = '$category'";
  $checkResult = $conn->query($checkQuery);

  if ($checkResult->num_rows > 0) {
    echo 'exists';
  } else {
    $insertQuery = "INSERT INTO category (category) VALUES ('$category')";

    if ($conn->query($insertQuery) === TRUE) {
      echo 'success';
    } else {
      echo 'error';
    }
  }
}

$conn->close();
?>
