<?php
include('../../config.php');
if (isset($_POST['ship'])) {
    $orderId = $_POST['orderId'];
    $sql = "UPDATE orders SET status = 5 WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Order is shipped out."); window.location.href = "../pickup.php";</script>';
    } else {
        echo '<script>alert("Failed to update order status."); window.location.href = "../pickup.php";</script>';
    }
}
?>
