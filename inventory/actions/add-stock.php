<?php
include('../../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the submitted values
  $category_id = $_POST["category_id"];
  $prod_id = $_POST["prod_id"];
  $color_id = $_POST["color_id"];
  $size_id = $_POST["size_id"];
  $quantity = $_POST["quantity"];

  // Check if the stock already exists
  $checkQuery = "SELECT * FROM stock 
                 WHERE category_id = '$category_id' 
                 AND prod_id = '$prod_id' 
                 AND color_id = '$color_id' 
                 AND size_id = '$size_id'";

  $checkResult = $conn->query($checkQuery);

  if ($checkResult->num_rows > 0) {
    // Stock already exists, update the quantity
    $row = $checkResult->fetch_assoc();
    $existingQuantity = $row["stock"];
    $newQuantity = $existingQuantity + $quantity;

    $updateQuery = "UPDATE stock 
                    SET stock = '$newQuantity' 
                    WHERE stock_id = " . $row["stock_id"];

    if ($conn->query($updateQuery) === TRUE) {
      echo '<script>alert("Stock updated successfully"); window.location.href = "../stock.php";</script>';
    } else {
      echo '<script>alert("Error updating stock: ' . $conn->error . '"); window.location.href = "../stock.php";</script>';
    }
  } else {
    // Stock doesn't exist, insert new stock
    $insertQuery = "INSERT INTO stock (category_id, prod_id, color_id, size_id, stock, barcode)
    VALUES ('$category_id', '$prod_id', '$color_id', '$size_id', '$quantity', '')";

    if ($conn->query($insertQuery) === TRUE) {
      $stockId = $conn->insert_id;
      $barcode = "../../../barcodes/" . $stockId . ".png";
      $barcodefilename = $stockId . ".png";

      require '../../vendor/autoload.php';

      // Generate and save the barcode image
      $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
      file_put_contents($barcode, $generatorPNG->getBarcode("$stockId", $generatorPNG::TYPE_CODE_128, 3, 50));

      $updateBarcodeQuery = "UPDATE stock SET barcode = '$barcodefilename' WHERE stock_id = $stockId";
      $conn->query($updateBarcodeQuery);
      
      echo '<img src="' . $barcode . '">';

      echo '<script>alert("Stock added successfully"); window.location.href = "../stock.php";</script>';
    } else {
      echo '<script>alert("Error adding stock: ' . $conn->error . '"); window.location.href = "../stock.php";</script>';
    }
  }
}

// Close the database connection
$conn->close();
?>
