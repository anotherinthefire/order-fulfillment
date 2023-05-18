<?php
include('../../config.php');

if (isset($_POST['completed'])) {
    $orderId = $_POST['orderId'];

    $proofQuery = "SELECT * FROM proof WHERE ord_id = $orderId AND pickup_img <> 'no-img.jpg'";
    $proofResult = mysqli_query($conn, $proofQuery);

    if (mysqli_num_rows($proofResult) > 0) {
        // Proof exists, update the order status
        $sql = "UPDATE orders SET status = 6 WHERE ord_id = $orderId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>alert("Order is Completed."); window.location.href = "../shipped.php";</script>';
        } else {
            echo '<script>alert("Failed to update order status."); window.location.href = "../shipped.php";</script>';
        }
    } else {
        // Proof does not exist, do not update the order status
        echo '<script>alert("Proof does not exist. Cannot update order status."); window.location.href = "../shipped.php";</script>';
    }
}
?>
