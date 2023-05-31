<?php
include('../config.php');
session_start(); 

$scannedQRCode = $_POST['qrCode'];

list($username, $password) = explode(':', $scannedQRCode);

try {
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $storedPassword = $admin['password'];
        if (password_verify($password, $storedPassword)) {
            // Login successful, set session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["name"] = $admin["name"];
            $_SESSION["user_level"] = $admin["user_level"];
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }

    $stmt->close();
} catch (Exception $e) {
    echo "error";
}

$conn->close();
?>
