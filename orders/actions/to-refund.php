<?php
include('../../config.php');

if (isset($_POST['refund'])) {
    $orderId = $_POST['orderId'];

    $proofQuery = "SELECT * FROM proof WHERE ord_id = $orderId AND remarks IS NOT NULL AND remarks_img <> 'no-img.jpg' AND remarks_date IS NOT NULL";
    $proofResult = mysqli_query($conn, $proofQuery);

    if (mysqli_num_rows($proofResult) > 0) {
        $sql = "UPDATE orders SET status = 7 WHERE ord_id = $orderId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>alert("Order has been moved to refund."); window.location.href = "../completed.php";</script>';
        } else {
            echo '<script>alert("Failed to update order status."); window.location.href = "../completed.php";</script>';
        }
    } else {
        echo '<script>alert("Remarks or remarks image do not exist. Cannot update order status."); window.location.href = "../completed.php";</script>';
    }
}
?>
