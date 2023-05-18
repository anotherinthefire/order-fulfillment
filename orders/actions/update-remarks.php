<?php
include('../../config.php');

if (isset($_POST['remarks']) && isset($_POST['orderId'])) {
    $remarks = $_POST['remarks'];
    $orderId = $_POST['orderId'];

    // Update the remarks in the proof table
    $sql = "UPDATE proof SET remarks = '$remarks' WHERE ord_id = $orderId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Remarks note updated successfully."); window.location.href = "../completed-view.php?id=' . $orderId . '";</script>';
    } else {
        echo '<script>alert("Failed to update remarks."); window.location.href = "../completed-view.php?id=' . $orderId . '";</script>';
    }
}

// Close the database connection
mysqli_close($conn);
?>
