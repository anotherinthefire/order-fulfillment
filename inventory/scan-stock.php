<?php
// Connect to the MySQL database
include('../config.php');
$scannedBarcode = $_POST['scannedBarcode'];

// Fetch the stock item based on the scanned barcode
$query = "SELECT * FROM stock WHERE stock_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $scannedBarcode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Stock item found, deduct the stock by 1 and increment the sales count
    $row = $result->fetch_assoc();
    $newStock = $row['stock'] - 1;
    $newSales = $row['sales'] + 1;

    // Update the stock table with the new stock and sales values
    $updateQuery = "UPDATE stock SET stock = ?, sales = ? WHERE stock_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("iis", $newStock, $newSales, $scannedBarcode);
    $updateStmt->execute();

    // Respond with a success message
    echo "Stock deducted successfully and sales record added!";
} else {
    // Stock item not found
    echo "Stock item not found!";
}

$stmt->close();
$updateStmt->close();
$conn->close();
?>