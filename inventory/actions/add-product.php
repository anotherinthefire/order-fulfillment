<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productName = $_POST['productName'];
  $productPrice = $_POST['productPrice'];
  $productDescription = $_POST['productDescription'];
  $productImage = $_FILES['productImage'];

  include '../../config.php';

  $sql = "INSERT INTO products (prod_name, prod_price, prod_desc) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $productName, $productPrice, $productDescription);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    $productId = mysqli_insert_id($conn);
    $extension = pathinfo($productImage['name'], PATHINFO_EXTENSION);
    $imageName = $productId . '.' . $extension;
    $imagePath = '../../../product_images/' . $imageName;
    move_uploaded_file($productImage['tmp_name'], $imagePath);

    $sql = "UPDATE products SET prod_img = ? WHERE prod_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $imageName, $productId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      echo "<script>alert('Product added successfully'); window.location.href = 'http://localhost/overallsia/order-fulfillment/inventory/product.php';</script>";
    } else {
      echo "<script>alert('Failed to add product image');</script>";
    }
    mysqli_stmt_close($stmt);
  } else {
    echo "<script>alert('Failed to add product');</script>";
  }

  mysqli_close($conn);
}
