<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
    </style>
</head>
<body>

    <form action="signup_handler.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
