<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$error = '';
$success = '';

// Handle photo upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_photo']['tmp_name'];
        $fileName = $_FILES['profile_photo']['name'];
        $fileSize = $_FILES['profile_photo']['size'];
        $fileType = $_FILES['profile_photo']['type'];

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExt, $allowedExtensions)) {
            $newFileName = "profile_$user_id." . $fileExt; // Unique file name
            $uploadDir = 'uploads/';
            $destPath = $uploadDir . $newFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Create uploads directory if it doesn't exist
            }

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Update user's profile photo path in the database
                $query = "UPDATE users SET profile_photo = ? WHERE user_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('si', $destPath, $user_id);
                if ($stmt->execute()) {
                    $success = 'Profile photo updated successfully!';
                } else {
                    $error = 'Failed to update profile photo in the database.';
                }
            } else {
                $error = 'Failed to move uploaded file.';
            }
        } else {
            $error = 'Invalid file type. Please upload a JPG, JPEG, PNG, or GIF file.';
        }
    } else {
        $error = 'No file uploaded or an error occurred during the upload.';
    }
}

// Fetch the current profile photo
$query = "SELECT profile_photo FROM users WHERE user_id = ?";
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
    <title>Edit Profile Photo | MARK-III</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
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

        .profile-preview {
            margin: 20px auto;
        }

        .profile-preview img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .form-group {
            margin: 15px 0;
        }

        .form-group input[type="file"] {
            display: block;
            margin: 0 auto;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #0078d4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #005a9e;
        }

        .message {
            margin-top: 15px;
            color: green;
        }

        .error {
            margin-top: 15px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Profile Photo</h1>

        <div class="profile-preview">
            <img src="<?= $user['profile_photo'] ?: 'default-avatar.png' ?>" alt="Current Profile Photo">
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="profile_photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <button type="submit">Upload Photo</button>
            </div>
        </form>

        <?php if ($success): ?>
            <p class="message"><?= htmlspecialchars($success) ?></p>
        <?php elseif ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="form-group">
            <a href="dashboard.php" style="color: #0078d4; text-decoration: none;">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
