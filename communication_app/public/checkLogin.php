<?php
// Start the session
session_start();

// Include the database configuration file
include '../config/config.php';

// Get the email and password from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare an SQL statement to select the user with the given email
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");

// Execute the SQL statement with the email
$stmt->execute([$email]);

// Fetch the user from the database
$user = $stmt->fetch();

// If the user exists and the password is correct
if ($user && password_verify($password, $user['password'])) {
    // Store the user's ID and email in the session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];

    // Redirect to the login success page
    header("Location: loginSuccess.php");
} else {
    // If the login credentials are invalid, display an error message
    echo "Invalid login credentials.";
}
?>