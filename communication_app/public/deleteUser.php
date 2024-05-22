<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require '../config/config.php';

$id = $_GET['id'];

try {
    // Start a transaction
    $pdo->beginTransaction();

    // Delete related records from the chats table
    $stmt = $pdo->prepare("DELETE FROM chats WHERE user_id = ?");
    $stmt->execute([$id]);

    // Delete related records from the uploads table
    $stmt = $pdo->prepare("DELETE FROM uploads WHERE user_id = ?");
    $stmt->execute([$id]);

    // Delete the user
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    // Commit the transaction
    $pdo->commit();

    header("Location: userList.php");
} catch (Exception $e) {
    // Rollback the transaction if something failed
    $pdo->rollBack();
    echo "Failed to delete user: " . $e->getMessage();
}
?>
