<?php
session_start();
require 'config.php';

// Ensure only admins can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $program_name = $_POST['program_name'];
    $description = $_POST['description'];
    $level = $_POST['level'];

    $query = "INSERT INTO programs (program_name, description, level) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $program_name, $description, $level);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
    } else {
        $error = "Error adding program.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Program | Admin Dashboard</title>
</head>
<body>
    <h1>Add New Program</h1>
    <form method="POST" action="add_program.php">
        <label>Program Name:</label>
        <input type="text" name="program_name" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <label>Level:</label>
        <input type="text" name="level" required><br>
        <button type="submit">Add Program</button>
    </form>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</body>
</html>
