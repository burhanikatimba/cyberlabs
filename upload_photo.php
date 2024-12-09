<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $upload_dir = 'uploads/';
    $file = $_FILES['profile_photo'];
    $file_name = basename($file['name']);
    $target_file = $upload_dir . $user_id . '_' . $file_name;

    // Validate file type and size
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowed_types) || $file['size'] > 5000000) {
        echo "Invalid file type or size!";
        exit;
    }

    // Upload file
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        $query = "UPDATE users SET profile_photo = ? WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $target_file, $user_id);
        $stmt->execute();
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Failed to upload photo.";
    }
}
?>
