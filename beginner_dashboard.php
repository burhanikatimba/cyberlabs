<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beginner Level</title>
    <style>
        body {
            font-family: 'Consolas', 'Courier New', monospace;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #001f3f, #002f5f);
            color: #00ff88;
            text-shadow: 0 0 5px #00ff88, 0 0 10px #00ff88;
        }

        .container {
            display: flex;
            min-height: 100vh;
            gap: 20px;
            padding: 20px;
        }

        .sidebar {
            flex: 0 0 25%;
            background: #003f8f;
            color: #00ff88;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #001f3f, 0 0 20px #002f5f;
        }

        .sidebar h3 {
            margin: 20px 0 10px;
            font-size: 18px;
            color: #00ff88;
            border-bottom: 1px solid #00ff88;
            padding-bottom: 5px;
            text-shadow: 0 0 5px #00ff88;
        }

        .sidebar a {
            display: block;
            color: #001f3f;
            text-decoration: none;
            padding: 10px 5px;
            margin: 5px 0;
            background: rgba(0, 63, 143, 0.8);
            border-radius: 5px;
            transition: background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar a:hover {
            background: #001f3f;
            color: #00ff88;
            box-shadow: 0 0 8px #00ff88;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background: rgba(0, 15, 31, 0.9);
            border-radius: 10px;
            color: #00ff88;
            text-shadow: 0 0 5px #00ff88;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .main-content h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .notes {
            display: none;
        }

        .notes.active {
            display: block;
        }

        .notes h2 {
            margin-top: 0;
            font-size: 22px;
            color: #00ff88;
        }

        .notes p {
            line-height: 1.6;
            color: #00ff88;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                flex: 0 0 auto;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h3>Introduction to Hacking</h3>
            <a href="#" onclick="showNotes('ethical-hacking')">Ethical Hacking</a>
            <a href="#" onclick="showNotes('hacking-basics')">Hacking Basics</a>

            <h3>Linux Commands</h3>
            <a href="#" onclick="showNotes('basic-commands')">Basic Commands</a>
            <a href="#" onclick="showNotes('file-permissions')">File Permissions</a>
        </div>
        <div class="main-content">
            <h1>Beginner Level</h1>
            <div class="notes-container">
    <div class="notes" id="ethical-hacking">
        <h2>Ethical Hacking</h2>
        <p>Ethical hacking is the practice of probing computer systems, networks, or applications to find security vulnerabilities that could be exploited by malicious hackers. Unlike illegal hacking, ethical hacking is performed with proper authorization and aims to improve security.</p>
        <h3>1. Purpose of Ethical Hacking</h3>
        <ul>
            <li><b>Identify Vulnerabilities:</b> Locate weak points in systems before attackers can exploit them.</li>
            <li><b>Enhance Security:</b> Help organizations strengthen their defenses against cyber threats.</li>
            <li><b>Comply with Regulations:</b> Assist businesses in meeting security compliance requirements.</li>
        </ul>
        <h3>2. Types of Ethical Hacking</h3>
        <ul>
            <li><b>Web Application Testing:</b> Examining websites for security loopholes.</li>
            <li><b>Network Penetration Testing:</b> Assessing vulnerabilities in local and wide-area networks.</li>
            <li><b>Social Engineering:</b> Testing employees’ susceptibility to phishing and other psychological attacks.</li>
        </ul>
        <h3>3. Tools Used</h3>
        <p>Some common tools used by ethical hackers include:</p>
        <ul>
            <li><b>Nmap:</b> A network scanning tool for identifying devices and open ports.</li>
            <li><b>Burp Suite:</b> A comprehensive tool for testing web applications.</li>
            <li><b>Wireshark:</b> A packet analyzer for inspecting network traffic.</li>
        </ul>
    </div>

    <div class="notes" id="hacking-basics">
        <h2>Hacking Basics</h2>
        <p>Hacking refers to the process of gaining unauthorized access to computers, networks, or digital systems. While hacking often has a negative connotation, it can also be used positively to improve security when conducted ethically.</p>
        <h3>1. Types of Hackers</h3>
        <ul>
            <li><b>Black Hat:</b> Malicious hackers who exploit vulnerabilities for personal gain.</li>
            <li><b>White Hat:</b> Ethical hackers who help organizations improve security.</li>
            <li><b>Gray Hat:</b> Hackers who may violate laws but without malicious intent.</li>
        </ul>
        <h3>2. Stages of Hacking</h3>
        <ul>
            <li><b>Reconnaissance:</b> Gathering information about the target system.</li>
            <li><b>Scanning:</b> Identifying vulnerabilities using tools like port scanners.</li>
            <li><b>Gaining Access:</b> Exploiting vulnerabilities to enter the system.</li>
            <li><b>Maintaining Access:</b> Ensuring continued access for future use.</li>
            <li><b>Covering Tracks:</b> Hiding evidence of the attack to avoid detection.</li>
        </ul>
    </div>

    <div class="notes" id="basic-commands">
        <h2>Basic Linux Commands</h2>
        <p>Linux commands are essential for managing and interacting with the operating system. They allow users to navigate directories, manage files, and perform administrative tasks efficiently.</p>
        <h3>1. File and Directory Management</h3>
        <ul>
            <li><b>ls:</b> Lists the contents of a directory.</li>
            <li><b>cd:</b> Changes the current directory.</li>
            <li><b>mkdir:</b> Creates a new directory.</li>
            <li><b>rm:</b> Removes files or directories.</li>
        </ul>
        <h3>2. System Monitoring</h3>
        <ul>
            <li><b>top:</b> Displays running processes and resource usage.</li>
            <li><b>df:</b> Shows disk space usage.</li>
            <li><b>free:</b> Displays memory usage.</li>
        </ul>
        <h3>3. File Viewing and Editing</h3>
        <ul>
            <li><b>cat:</b> Displays the contents of a file.</li>
            <li><b>nano:</b> Opens a simple text editor.</li>
            <li><b>vim:</b> Launches a powerful text editor for advanced users.</li>
        </ul>
    </div>

    <div class="notes" id="file-permissions">
        <h2>File Permissions</h2>
        <p>File permissions in Linux determine who can read, write, or execute a file or directory. These permissions are crucial for maintaining system security and preventing unauthorized access.</p>
        <h3>1. Types of Permissions</h3>
        <ul>
            <li><b>Read (r):</b> Allows viewing the contents of a file.</li>
            <li><b>Write (w):</b> Allows modifying the contents of a file.</li>
            <li><b>Execute (x):</b> Allows running a file as a program or script.</li>
        </ul>
        <h3>2. Understanding File Modes</h3>
        <p>File permissions are displayed as a 10-character string (e.g., <code>-rwxr-xr--</code>):</p>
        <ul>
            <li>The first character indicates the type of file (e.g., <code>-</code> for regular files, <code>d</code> for directories).</li>
            <li>The next nine characters represent permissions for the owner, group, and others.</li>
        </ul>
        <h3>3. Changing Permissions</h3>
        <p>Use the <code>chmod</code> command to modify file permissions:</p>
        <ul>
            <li><code>chmod 755 filename</code>: Sets read, write, and execute for the owner; read and execute for others.</li>
            <li><code>chmod u+w filename</code>: Adds write permission for the owner.</li>
        </ul>
    </div>
</div>

        </div>
    </div>

    <script>
        function showNotes(topicId) {
            const allNotes = document.querySelectorAll('.notes');
            allNotes.forEach(note => note.classList.remove('active'));

            const selectedNote = document.getElementById(topicId);
            if (selectedNote) {
                selectedNote.classList.add('active');
            }
        }
    </script>
</body>
</html>
