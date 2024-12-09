<?php
session_start();
require 'config.php';

// Ensure only admins can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$program_id = $_GET['id'] ?? null;

if ($program_id) {
    $query = "DELETE FROM programs WHERE program_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $program_id);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error deleting program.";
    }
} else {
    header("Location: admin_dashboard.php");
}
?>
