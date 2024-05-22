<?php
// Include the database configuration file
include '../config/config.php';

// Get the submitted full name, email, password, and confirm password
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// If the password and confirm password do not match
if ($password !== $confirm_password) {
    // Display an error message and a link to go back to the registration page
    echo "Passwords do not match. <a href='register.php'>Go back</a>";
    // Stop the script
    exit();
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare an SQL statement to insert the full name, email, and hashed password into the users table
$stmt = $pdo->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
// Execute the SQL statement with the full name, email, and hashed password
$stmt->execute([$full_name, $email, $hashed_password]);

// Display a success message
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Registration Successful</title>
    <style>
        
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }
        
        .message-box {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20vh;
        }
        
        .message-box h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
       
        .message-box p {
            margin: 5px 0;
            font-size: 18px;
        }
        
        .message-box a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007BFF;
            font-size: 16px;
        }
        
        .message-box a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class='message-box'>
        <h1>Registration Successful</h1>
        <p>Thank you for registration.</p>
        <a href='welcome.php'>Click to return to home page</a>
    </div>
</body>
</html>
";
?>