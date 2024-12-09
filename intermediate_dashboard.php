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
    <title>Intermediate Level</title>
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
            background: linear-gradient(to bottom, #32cd32, #ffffff); /* Green to White */
            color: #20232a;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .sidebar h3 {
            margin: 20px 0 10px;
            font-size: 16px;
            text-transform: uppercase;
            color: #20232a;
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        .sidebar a {
            display: block;
            color: #20232a;
            text-decoration: none;
            padding: 10px 5px;
            margin: 5px 0;
            background: rgba(50, 205, 50, 0.8);
            border-radius: 5px;
            transition: background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Neon Blue Effect */
        .sidebar a:hover {
            background: #20232a;
            color: #ffd700;
            box-shadow: 0 0 10px 2px rgba(0, 153, 255, 0.8); /* Neon blue glowing effect */
            text-shadow: 0 0 8px #00ffff, 0 0 20px #00ffff, 0 0 30px #00ffff;
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
            font-size: 24px;
            margin-bottom: 20px;
            color: #20232a;
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
        .notes pre {
            background-color: blue;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            overflow: auto;
            box-shadow: 0 0 10px #a6ff00, 0 0 20px #a6ff00; 
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
            <h3>Networking Basics</h3>
            <a href="#" onclick="showNotes('subnetting')">Subnetting</a>
            <a href="#" onclick="showNotes('tcp-ip')">TCP/IP</a>

            <h3>Shell Scripting</h3>
            <a href="#" onclick="showNotes('bash-basics')">Bash Basics</a>
            <a href="#" onclick="showNotes('loops')">Loops and Conditionals</a>
        </div>
        <div class="main-content">
            <h1>Intermediate Level</h1>
            <div id="notes-container">
                <div class="notes" id="subnetting">
                    <h2>Subnetting</h2>
                    <p>
                        Subnetting is a technique used to divide a larger network into smaller, manageable sub-networks (subnets). 
                        It improves network efficiency, enhances security, and reduces congestion by isolating traffic within subnets.
                    </p>
                    <p>
                        Each subnet operates within its own address range, defined by its subnet mask. For example, the subnet mask 
                        <code>255.255.255.0</code> means that the first three octets represent the network, while the last octet is used for hosts.
                    </p>
                    <h3>Benefits of Subnetting</h3>
                    <ul>
                        <li>Reduces network congestion by localizing traffic.</li>
                        <li>Improves security by isolating sensitive devices within specific subnets.</li>
                        <li>Optimizes IP address usage in larger networks.</li>
                    </ul>
                    <h3>Practice Commands</h3>
                    <pre>
# Calculate subnet information (Install ifconfig or ipcalc if not available)
sudo apt update && sudo apt install -y ipcalc
ipcalc 192.168.1.0/24

# Configure a static IP and subnet mask
sudo ifconfig eth0 192.168.1.10 netmask 255.255.255.0
                    </pre>
                </div>

                <div class="notes" id="tcp-ip">
                    <h2>TCP/IP</h2>
                    <p>
                        The TCP/IP (Transmission Control Protocol/Internet Protocol) suite is the foundation of internet communication. 
                        It defines how data is transmitted and received across networks.
                    </p>
                    <h3>Key Features</h3>
                    <ul>
                        <li><strong>Layered Structure:</strong> TCP/IP has four layers: Link, Internet, Transport, and Application.</li>
                        <li><strong>Reliability:</strong> TCP ensures data is delivered accurately, while IP handles addressing and routing.</li>
                        <li><strong>Scalability:</strong> Designed to handle massive and growing networks.</li>
                    </ul>
                    <h3>Common Commands</h3>
                    <pre>
# Check current network configuration
ifconfig

# Ping a server to test connectivity
ping -c 4 8.8.8.8

# Display open network connections
netstat -tuln
                    </pre>
                </div>

                <div class="notes" id="bash-basics">
                    <h2>Bash Basics</h2>
                    <p>
                        Bash (Bourne Again SHell) is a Unix shell and command language for performing tasks in Linux environments. 
                        It supports scripting, which can automate repetitive tasks.
                    </p>
                    <h3>Essential Commands</h3>
                    <ul>
                        <li><strong>ls:</strong> List files and directories. Example: <code>ls -l</code></li>
                        <li><strong>cd:</strong> Change directory. Example: <code>cd /home/user</code></li>
                        <li><strong>touch:</strong> Create a file. Example: <code>touch example.txt</code></li>
                        <li><strong>mkdir:</strong> Create a directory. Example: <code>mkdir mydir</code></li>
                    </ul>
                    <h3>Simple Bash Script</h3>
                    <pre>
# Create a script file
echo '#!/bin/bash' > myscript.sh
echo 'echo "Hello, Cloud Labs!"' >> myscript.sh
chmod +x myscript.sh
./myscript.sh
                    </pre>
                </div>

                <div class="notes" id="loops">
                    <h2>Loops and Conditionals</h2>
                    <p>
                        Loops and conditionals are fundamental in programming. They allow scripts to execute commands based on conditions 
                        or iterate through data.
                    </p>
                    <h3>Examples</h3>
                    <pre>
# For loop example
for i in {1..5}; do
    echo "Iteration $i"
done

# If-else example
if [ $(date +%H) -lt 12 ]; then
    echo "Good Morning"
else
    echo "Good Afternoon"
fi
                    </pre>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showNotes(topicId) {
            const allNotes = document.querySelectorAll('.notes');
            allNotes.forEach(note => note.classList.remove('active'));
            
            const activeNote = document.getElementById(topicId);
            activeNote.classList.add('active');
        }
    </script>
</body>
</html>
