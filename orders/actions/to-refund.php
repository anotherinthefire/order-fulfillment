<?php
include('../../config.php');
if (isset($_POST['refund'])) {
    $orderId = $_POST['orderId'];
    $sql = "UPDATE orders SET status = 7 WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Order has been moved to refund."); window.location.href = "../refund.php";</script>';
    } else {
        echo '<script>alert("Failed to update order status."); window.location.href = "../refund.php";</script>';
    }
}
?>
