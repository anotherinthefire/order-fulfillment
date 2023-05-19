<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $productName = $_POST['productName'];
  $productPrice = $_POST['productPrice'];
  $productDescription = $_POST['productDescription'];
  $productImage = $_FILES['productImage'];

  // Validate and sanitize the form data as needed

  // Perform database operations to insert the new product
  // Assuming you have a database connection established
  include '../../config.php'; // Include your database configuration file

  // Prepare the SQL statement with parameterized query
  $sql = "INSERT INTO products (prod_name, prod_price, prod_desc) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $productName, $productPrice, $productDescription);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    // Get the last inserted product ID
    $productId = mysqli_insert_id($conn);

    // Extract the file extension
    $extension = pathinfo($productImage['name'], PATHINFO_EXTENSION);

    // Construct the image file name using the product ID and extension
    $imageName = $productId . '.' . $extension;

    // Move the uploaded image file to the desired location with the new file name
    $imagePath = '../../../product_images/' . $imageName;
    move_uploaded_file($productImage['tmp_name'], $imagePath);

    // Update the product record with the image file name
    $sql = "UPDATE products SET prod_img = ? WHERE prod_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $imageName, $productId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      // Product inserted and image stored successfully
      echo "<script>alert('Product added successfully'); window.location.href = 'http://localhost/overallsia/order-fulfillment/inventory/product.php';</script>";
    } else {
      // Failed to update product with image
      echo "<script>alert('Failed to add product image');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  } else {
    // Failed to insert product
    echo "<script>alert('Failed to add product');</script>";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
