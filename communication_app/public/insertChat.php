<?php
// Start the session
session_start();

// If the user is not logged in, redirect to the welcome page
if (!isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

// Include the database configuration file
include '../config/config.php';

// Get the message from the form
$message = $_POST['message'];

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Prepare an SQL statement to insert the message into the chats table
$stmt = $pdo->prepare("INSERT INTO chats (user_id, message) VALUES (?, ?)");

// Execute the SQL statement with the user ID and the message
$stmt->execute([$user_id, $message]);

// Redirect to the chat page
header("Location: chat.php");
?>