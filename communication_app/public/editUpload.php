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

// Get the ID of the upload to edit from the URL parameters
$id = $_GET['id'];

// If the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the new file name from the form
    $file_name = $_POST['file_name'];

    // Prepare an SQL statement to update the file name of the upload with the given ID
    $stmt = $pdo->prepare("UPDATE uploads SET file_name = ? WHERE id = ?");

    // Execute the SQL statement with the new file name and the ID
    $stmt->execute([$file_name, $id]);

    // Redirect to the upload list page
    header("Location: uploadList.php");
    exit();
}

// Prepare an SQL statement to select the upload with the given ID
$stmt = $pdo->prepare("SELECT * FROM uploads WHERE id = ?");

// Execute the SQL statement with the ID
$stmt->execute([$id]);

// Fetch the upload from the database
$upload = $stmt->fetch();
?>
<?php
// Include the header file
include '../partials/header.php';
?>
<div class="form-container">
    <h2>Edit Upload</h2>
    <!-- Form to edit the upload -->
    <form action="" method="post">
        <label for="file_name">File Name</label><br>
        <!-- Input field for the new file name, pre-filled with the current file name -->
        <input type="text" name="file_name" value="<?= htmlspecialchars($upload['file_name']) ?>" required><br><br>
        <!-- Button to submit the form -->
        <button type="submit">Update</button>
        <!-- Button to cancel the edit and go back to the upload list page -->
        <button type="button" onclick="window.location.href='uploadList.php'">Cancel</button>
    </form>
</div>
<?php
// Include the footer file
include '../partials/footer.php';
?>