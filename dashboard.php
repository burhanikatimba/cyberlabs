<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$query = "SELECT first_name, last_name, email, profile_photo FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | MARK-III</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            color: #0078d4;
        }

        .user-info {
            margin: 20px 0;
            position: relative;
            display: inline-block;
        }

        .user-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .user-info img:hover {
            transform: scale(1.1);
        }

        .edit-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .user-info:hover .edit-overlay {
            opacity: 1;
        }

        .edit-overlay span {
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .level-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
        }

        .level-buttons a {
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .level-buttons .beginner { background-color: #0078d4; }
        .level-buttons .intermediate { background-color: #28a745; }
        .level-buttons .advanced { background-color: #d4af37; }

        .level-buttons a:hover {
            opacity: 0.9;
        }

        .buttons {
            margin-top: 20px;
        }

        .buttons a {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            background-color: #0078d4;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .buttons a:hover {
            background-color: #005a9e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>!</h1>
        <div class="user-info">
            <img src="<?= $user['profile_photo'] ?: 'default-avatar.png' ?>" alt="Profile Photo">
            <div class="edit-overlay">
                <span>Edit</span>
            </div>
        </div>

        <p>Email: <?= htmlspecialchars($user['email']) ?></p>

        <div class="level-buttons">
            <a href="beginner_dashboard.php" class="beginner">Beginner</a>
            <a href="intermediate_dashboard.php" class="intermediate">Intermediate</a>
            <a href="advanced_dashboard.php" class="advanced">Advanced</a>
        </div>

        <div class="buttons">
            <a href="change_password.php">Change Password</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <script>
        // Handle profile photo edit click
        document.querySelector('.user-info').addEventListener('click', function() {
            window.location.href = 'dp.php';
        });
    </script>
</body>
</html>
