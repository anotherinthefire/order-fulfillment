<?php
include('../../config.php');

if (isset($_POST['paid'])) {
    $orderId = $_POST['orderId'];

    // Check if proof exists for the orderId
    $proofQuery = "SELECT * FROM proof WHERE ord_id = $orderId AND payment_img <> 'no-img.jpg'";
    $proofResult = mysqli_query($conn, $proofQuery);

    if (mysqli_num_rows($proofResult) > 0) {
        // Proof exists, update the order status
        $sql = "UPDATE orders SET status = 3 WHERE ord_id = $orderId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>alert("Order status updated to Paid."); window.location.href = "../confirmed.php";</script>';
        } else {
            echo '<script>alert("Failed to update order status."); window.location.href = "../confirmed.php";</script>';
        }
    } else {
        // Proof does not exist, do not update the order status
        echo '<script>alert("Proof does not exist. Cannot update order status."); window.location.href = "../confirmed.php";</script>';
    }
}
?>
