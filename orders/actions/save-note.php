<?php
include('../../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['orderId']) && isset($_POST['note'])) {
        $orderId = $_POST['orderId'];
        $note = $_POST['note'];

        // Update the note in the database
        $sql = "UPDATE orders SET note = '$note' WHERE ord_id = $orderId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Note has been saved successfully.";
        } else {
            echo "Failed to save the note.";
        }
    }
}
?>
