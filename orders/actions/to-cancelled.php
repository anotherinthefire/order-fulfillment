<?php
include('../../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['orderId'])) {
        $orderId = $_POST['orderId'];

        $getUserQuery = "SELECT user_id FROM orders WHERE ord_id = $orderId";
        $getUserResult = mysqli_query($conn, $getUserQuery);
        $userRow = mysqli_fetch_assoc($getUserResult);
        $userId = $userRow['user_id'];

        $checkUserOrdersQuery = "SELECT COUNT(*) AS orderCount FROM orders WHERE user_id = $userId AND status = 8";
        $checkUserOrdersResult = mysqli_query($conn, $checkUserOrdersQuery);
        $orderCountRow = mysqli_fetch_assoc($checkUserOrdersResult);
        $orderCount = $orderCountRow['orderCount'];

        if ($orderCount >= 3) {
            $updateUserStatusQuery = "UPDATE user SET status = 2 WHERE user_id = $userId";
            $updateUserStatusResult = mysqli_query($conn, $updateUserStatusQuery);

            if ($updateUserStatusResult) {
                echo '<script>alert("User status has been banned."); window.location.href = "../cancelled.php";</script>';
            } else {
                echo '<script>alert("Failed to update user status."); window.location.href = "../cancelled.php";</script>';
            }
        } else {
            // Update the order status to 8
            $updateOrderStatusQuery = "UPDATE orders SET status = 8 WHERE ord_id = $orderId";
            $updateOrderStatusResult = mysqli_query($conn, $updateOrderStatusQuery);

            if ($updateOrderStatusResult) {
                echo '<script>alert("Order has been cancelled."); window.location.href = "../cancelled.php";</script>';
            } else {
                echo '<script>alert("Failed to update order status."); window.location.href = "../cancelled.php";</script>';
            }
        }
    }
}
?>
