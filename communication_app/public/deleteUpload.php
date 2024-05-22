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

// Get the ID of the upload to delete from the URL parameters
$id = $_GET['id'];

// Prepare an SQL statement to delete the upload with the given ID
$stmt = $pdo->prepare("DELETE FROM uploads WHERE id = ?");

// Execute the SQL statement with the ID
$stmt->execute([$id]);

// Redirect to the upload list page
header("Location: uploadList.php");
?>