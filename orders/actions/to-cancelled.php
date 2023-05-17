<?php
include('../../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['orderId'])) {
        $orderId = $_POST['orderId'];
        $sql = "UPDATE orders SET status = 8 WHERE ord_id = $orderId";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>alert("Order has been cancelled."); window.location.href = "../cancelled.php";</script>';
        } else {
            echo '<script>alert("Failed to update order status."); window.location.href = "../cancelled.php";</script>';
        }
    }
}
?>
