<?php
include('../../config.php');
if (isset($_POST['followUp'])) {
    $orderId = $_POST['orderId'];
    $sql = "UPDATE orders SET status = 1 WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Order status updated to Followed Up."); window.location.href = "../pending.php";</script>';
    } else {
        echo '<script>alert("Failed to update order status."); window.location.href = "../pending.php";</script>';
    }
}
?>
