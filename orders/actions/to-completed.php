<?php
include('../../config.php');
if (isset($_POST['completed'])) {
    $orderId = $_POST['orderId'];
    $sql = "UPDATE orders SET status = 6 WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Order is Completed."); window.location.href = "../shipped.php";</script>';
    } else {
        echo '<script>alert("Failed to update order status."); window.location.href = "../shipped.php";</script>';
    }
}
?>
