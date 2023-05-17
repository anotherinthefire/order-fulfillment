<?php
include('../../config.php');
if (isset($_POST['paid'])) {
    $orderId = $_POST['orderId'];
    $sql = "UPDATE orders SET status = 3 WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Order status updated to Paid."); window.location.href = "../confirmed.php";</script>';
    } else {
        echo '<script>alert("Failed to update order status."); window.location.href = "../confirmed.php";</script>';
    }
}
?>
