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
    <title>Advanced Level</title>
    <style>
        body {
            font-family: 'Consolas', 'Courier New', monospace; /* Changed font to monospace */
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
            gap: 20px; /* Space between sidebar and main content */
            padding: 20px;
        }

        .sidebar {
            flex: 0 0 25%;
            background: #ffd700; /* Gold color */
            color: #20232a;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px; /* Added border-radius */
        }

        .sidebar h3 {
            margin: 20px 0 10px;
            font-size: 16px;
            text-transform: uppercase;
            color: #20232a; /* Dark text for contrast */
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        .sidebar a {
            display: block;
            color: #20232a; /* Dark text for contrast */
            text-decoration: none;
            padding: 10px 5px;
            margin: 5px 0;
            background: rgba(255, 215, 0, 0.8); /* Slightly transparent gold */
            border-radius: 5px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .sidebar a:hover {
            background: #20232a; /* Dark background on hover */
            color: #ffd700; /* Gold text on hover */
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background: #fff;
            border-radius: 10px; /* Same border-radius as the sidebar */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .main-content h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #20232a;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px #00f, 0 0 20px #00f, 0 0 30px #00f; /* Blue neon glow */
        }

        .notes {
            display: none;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .notes.active {
            display: block;
        }

        .notes pre {
            background: #2e3b4e;
            color: #a6ff00;
            padding: 15px;
            border-radius: 8px;
            font-size: 1rem;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow: auto;
            box-shadow: 0 0 10px #a6ff00, 0 0 20px #a6ff00; /* Neon green glow for code */
        }

        .notes h2 {
            color: #20232a;
            margin-bottom: 15px;
            font-size: 22px;
            text-transform: uppercase;
            text-shadow: 0 0 10px #00f, 0 0 20px #00f, 0 0 30px #00f; /* Blue neon glow */
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
            <h3>Advanced Networking</h3>
            <a href="#network-security" onclick="showNotes('network-security')">Network Security</a>
            <a href="#protocols" onclick="showNotes('protocols')">Advanced Protocols</a>

            <h3>System Optimization</h3>
            <a href="#performance-tuning" onclick="showNotes('performance-tuning')">Performance Tuning</a>
            <a href="#scalability" onclick="showNotes('scalability')">Scalability</a>
        </div>
        <div class="main-content">
            <h1>Advanced Level</h1>
            <div id="network-security" class="notes">
                <h2>Network Security</h2>
                <p>Network security involves protecting the integrity, confidentiality, and availability of computer networks and data...</p>
                <pre><code>
# Example command to check active connections:
netstat -an

# Example firewall setup:
ufw allow from 192.168.1.0/24 to any port 22
                </code></pre>
            </div>
            <div id="protocols" class="notes">
                <h2>Advanced Protocols</h2>
                <p>Advanced protocols refer to complex communication protocols that provide the foundation for data exchange in networks...</p>
                <pre><code>
# Example of SSH tunneling:
ssh -L 8080:localhost:80 user@remote_host

# HTTP headers with advanced options:
curl -H "X-Forwarded-For: 127.0.0.1" http://example.com
                </code></pre>
            </div>
            <div id="performance-tuning" class="notes">
                <h2>Performance Tuning</h2>
                <p>Performance tuning refers to the process of optimizing the performance of software, systems, or networks...</p>
                <pre><code>
# Example of system performance check:
top -o %MEM

# Example of tuning sysctl parameters:
sysctl -w vm.swappiness=10
                </code></pre>
            </div>
            <div id="scalability" class="notes">
                <h2>Scalability</h2>
                <p>Scalability refers to the ability of a system, network, or application to handle an increasing amount of work...</p>
                <pre><code>
# Example of horizontal scaling:
docker-compose scale web=5

# Example of cloud scaling:
aws autoscaling create-auto-scaling-group --min-size 2 --max-size 10
                </code></pre>
            </div>
        </div>
    </div>

    <script>
        function showNotes(topicId) {
            document.querySelectorAll('.notes').forEach(note => note.classList.remove('active'));
            const selectedNote = document.getElementById(topicId);
            if (selectedNote) {
                selectedNote.classList.add('active');
            }
        }
    </script>
</body>
</html>
