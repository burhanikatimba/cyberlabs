<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | MARK-III</title>
    <style>
        /* Reset basic styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: linear-gradient(135deg, #0062cc, #00c6ff);
            color: #fff;
        }

        /* Main content */
        .main-content {
            flex: 1;
            text-align: center;
            padding: 50px 20px;
        }

        .container {
            margin-top: 10%;
        }

        .btn {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #0078d7;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #005a9e;
        }

        /* Footer styles */
        footer {
            background-color: #004080;
            color: #fff;
            padding: 20px 0;
            font-size: 14px;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-column {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }

        .footer-column h3 {
            border-bottom: 2px solid #00c6ff;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer-column ul li {
            margin: 5px 0;
        }

        .footer-column ul li a {
            text-decoration: none;
            color: #fff;
        }

        .footer-column ul li a:hover {
            color: #00c6ff;
        }

        .footer-bottom {
            text-align: center;
            background-color: #003366;
            padding: 10px 0;
        }

        .footer-bottom a {
            color: #00c6ff;
            text-decoration: none;
        }

        .footer-bottom a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h1>Welcome to MARK-III</h1>
            <p>Your cloud lab for ethical hacking and learning!</p>
            <button class="btn" onclick="location.href='login.php'">Login</button>
            <button class="btn" onclick="location.href='signup.php'">Register</button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>ABOUT</h3>
                <ul>
                    <li><a href="vision.php">Vision & Objectives</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Mission</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>ADMISSION</h3>
                <ul>
                    <li><a href="#">Registration</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Schedule</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>SUPPORT</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Help Desk</a></li>
                    <li><a href="#">Technical Support</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>CONTACT</h3>
                <ul>
                    <li><a href="mailto:burhanikatimba@gmail.com">Email: burhanikatimba@gmail.com</a></li>
                    <li><a href="https://wa.me/088747284" target="_blank">WhatsApp: 088747284</a></li>
                    <li><a href="https://instagram.com/ghost_bravo.07.TF141" target="_blank">Instagram </a></li>
                    <li><a href="https://twitter.com/ghost_bravo.07.TF141" target="_blank">Twitter </a></li>
                    <li><a href="https://facebook.com/ghost_bravo.07.TF141" target="_blank">Facebook </a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>By clicking "Agree," you comply with the <a href="#">Terms and Conditions</a>, <a href="#">Privacy Policy</a>, and <a href="#">Rules and Regulations</a>.</p>
        </div>
    </footer>
</body>
</html>
