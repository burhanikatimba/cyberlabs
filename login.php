<?php
session_start();
require 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check for hardcoded admin credentials
    $admin_email = 'admin@example.com'; // Replace with your admin email
    $admin_password = 'admin123';      // Replace with your admin password

    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['user_id'] = 0; // Admin doesn't need a regular user ID
        $_SESSION['role'] = 'admin';
        header("Location: admin_dashboard.php");
        exit;
    }

    // Check for normal users in the database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: dashboard.php");
        }
        exit;
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MARK-III</title>
    <style>
        /* General reset for the page */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form container styling */
        form {
            background: #ffffff;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 400px;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        /* Title styling */
        h1 {
            text-align: center;
            color: #2c2c2c;
            margin-bottom: 20px;
        }

        /* Label styling */
        label {
            color: #444444;
            margin-top: 10px;
            font-size: 14px;
            font-weight: 500;
        }

        /* Input fields styling */
        input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #0078d4; /* Windows blue */
            box-shadow: 0 0 3px #0078d4;
        }

        /* Button styling */
        button {
            margin-top: 20px;
            background-color: #0078d4;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #005a9e;
        }

        /* Add responsiveness */
        @media (max-width: 480px) {
            form {
                width: 90%;
            }
        }

        /* Error message styling */
        p {
            color: #d9534f;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        
        <button type="submit">Login</button>
    </form>

    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</body>
</html>
