<?php
include('../../config.php');

if (isset($_POST['remarks']) && isset($_POST['orderId'])) {
    $remarks = $_POST['remarks'];
    $orderId = $_POST['orderId'];

    $sql = "UPDATE proof SET remarks = '$remarks' WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Remarks note updated successfully."); window.location.href = "../completed-view.php?id=' . $orderId . '";</script>';
    } else {
        echo '<script>alert("Failed to update remarks."); window.location.href = "../completed-view.php?id=' . $orderId . '";</script>';
    }
}

mysqli_close($conn);
?>
