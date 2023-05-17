<?php
include('../../config.php');
if (isset($_POST['confirm'])) {
    $orderId = $_POST['orderId'];
    $sql = "UPDATE orders SET status = 2 WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Order status updated to Confirm."); window.location.href = "../followup.php";</script>';
    } else {
        echo '<script>alert("Failed to update order status."); window.location.href = "../followup.php";</script>';
    }
}
?>
