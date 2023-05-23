<?php
include('../../config.php');

if (isset($_POST['ship'])) {
    $orderId = $_POST['orderId'];

    $pickupImgQuery = "SELECT pickup_img FROM proof WHERE ord_id = $orderId AND pickup_img <> 'no-img.jpg'";
    $pickupImgResult = mysqli_query($conn, $pickupImgQuery);

    if (mysqli_num_rows($pickupImgResult) > 0) {
        $sql = "UPDATE orders SET status = 5 WHERE ord_id = $orderId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>alert("Order is shipped out."); window.location.href = "../pickup.php";</script>';
        } else {
            echo '<script>alert("Failed to update order status."); window.location.href = "../pickup.php";</script>';
        }
    } else {
        echo '<script>alert("pickup_img does not exist. Cannot update order status."); window.location.href = "../pickup.php";</script>';
    }
}
?>
