<?php
// Include the database configuration
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    // Validate inputs
    if (!$first_name || !$last_name || !$email || !$password) {
        die("All fields are required. Please try again.");
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Prepare and execute the query
        $query = "INSERT INTO users (first_name, last_name, email, password_hash) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $first_name, $last_name, $email, $password_hash);

        if ($stmt->execute()) {
            echo "Account created successfully!";
            header("Location: login.php"); // Redirect to login page
            exit();
        } else {
            if ($conn->errno === 1062) { // Duplicate email error
                echo "An account with this email already exists.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
