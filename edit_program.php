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
    $query = "SELECT * FROM programs WHERE program_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $program_id);
    $stmt->execute();
    $program = $stmt->get_result()->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $program_name = $_POST['program_name'];
        $description = $_POST['description'];
        $level = $_POST['level'];

        $update_query = "UPDATE programs SET program_name = ?, description = ?, level = ? WHERE program_id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("sssi", $program_name, $description, $level, $program_id);

        if ($update_stmt->execute()) {
            header("Location: admin_dashboard.php");
        } else {
            $error = "Error updating program.";
        }
    }
} else {
    header("Location: admin_dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Program | Admin Dashboard</title>
</head>
<body>
    <h1>Edit Program</h1>
    <form method="POST" action="">
        <label>Program Name:</label>
        <input type="text" name="program_name" value="<?php echo $program['program_name']; ?>" required><br>
        <label>Description:</label>
        <textarea name="description" required><?php echo $program['description']; ?></textarea><br>
        <label>Level:</label>
        <input type="text" name="level" value="<?php echo $program['level']; ?>" required><br>
        <button type="submit">Update Program</button>
    </form>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</body>
</html>
