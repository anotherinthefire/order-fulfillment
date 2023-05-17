<?php
include('../../config.php');
if (isset($_POST['pickup'])) {
    $orderId = $_POST['orderId'];
    $sql = "UPDATE orders SET status = 4 WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Order status is now ready for pickup."); window.location.href = "../paid.php";</script>';
    } else {
        echo '<script>alert("Failed to update order status."); window.location.href = "../paid.php";</script>';
    }
}
?>
