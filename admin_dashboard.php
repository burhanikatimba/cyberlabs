<?php
session_start();
require 'config.php';

// Ensure only admins can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Include admin functions
require 'admin_functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | MARK-III</title>
    <style>
        /* General reset for the page */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0078d4; /* Windows blue */
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            background-color: #005a9e;
            transition: background-color 0.3s;
        }

        header a:hover {
            background-color: #003d73;
        }

        .container {
            padding: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-header {
            background-color: #0078d4;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-header:hover {
            background-color: #005a9e;
        }

        .section-content {
            display: none;
            padding: 15px;
            background-color: white;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 10px;
        }

        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0078d4;
            color: white;
        }

        .action-btn {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            margin: 0 5px;
            display: inline-block;
            color: white;
            transition: background-color 0.3s;
        }

        .edit-btn {
            background-color: #ffc107;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<header>
    <h1>Admin Dashboard</h1>
    <a href="logout.php">Logout</a>
</header>

<div class="container">

    <!-- Programs Section -->
    <div class="section">
        <div class="section-header" onclick="toggleSection('programs-section')">
            Manage Programs
            <span>&#9660;</span> <!-- Down Arrow -->
        </div>
        <div id="programs-section" class="section-content">
            <a href="add_program.php" class="action-btn" style="background-color: #28a745;">Add New Program</a>
            <table>
                <tr>
                    <th>Program Name</th>
                    <th>Description</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>
                <?php
                $programs = getPrograms($conn); // Fetch programs
                foreach ($programs as $program) {
                    echo "<tr>
                        <td>{$program['program_name']}</td>
                        <td>{$program['description']}</td>
                        <td>{$program['level']}</td>
                        <td>
                            <a href='edit_program.php?id={$program['program_id']}' class='action-btn edit-btn'>Edit</a>
                            <a href='delete_program.php?id={$program['program_id']}' class='action-btn delete-btn'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Users Section -->
    <div class="section">
        <div class="section-header" onclick="toggleSection('users-section')">
            Manage Users
            <span>&#9660;</span> <!-- Down Arrow -->
        </div>
        <div id="users-section" class="section-content">
            <a href="add_user.php" class="action-btn" style="background-color: #28a745;">Add New User</a>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                <?php
                $users = getUsers($conn); // Fetch users
                foreach ($users as $user) {
                    echo "<tr>
                        <td>{$user['first_name']}</td>
                        <td>{$user['last_name']}</td>
                        <td>{$user['email']}</td>
                        <td>{$user['role']}</td>
                        <td>
                            <a href='edit_user.php?id={$user['user_id']}' class='action-btn edit-btn'>Edit</a>
                            <a href='delete_user.php?id={$user['user_id']}' class='action-btn delete-btn'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>

</div>

<script>
    function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        section.style.display = section.style.display === 'none' || section.style.display === '' ? 'block' : 'none';
    }
</script>

</body>
</html>
