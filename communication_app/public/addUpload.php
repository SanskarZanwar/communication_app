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

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the custom file name from the form
    $custom_file_name = $_POST['file_name'];

    // Get the uploaded file from the form
    $file = $_FILES['file'];

    // Get the extension of the uploaded file
    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    // Define the path where the file will be uploaded
    $upload_path = 'uploads/' . $custom_file_name . '.' . $file_extension;

    // If the file is successfully uploaded
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        // Prepare an SQL statement to insert the file information into the database
        $stmt = $pdo->prepare("INSERT INTO uploads (user_id, file_name, upload_path) VALUES (?, ?, ?)");

        // Execute the SQL statement with the user ID, file name, and upload path
        $stmt->execute([$_SESSION['user_id'], $custom_file_name . '.' . $file_extension, $upload_path]);

        // Redirect to the upload list page
        header("Location: uploadList.php");
        exit();
    } else {
        // If the file upload fails, display an error message
        echo "File upload failed.";
    }
}

// Include the header file
include '../partials/header.php';
?>

<!-- Form for uploading a file -->
<div class="form-container">
    <h2>Add New Upload</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">File</label><br>
        <input type="file" name="file" required><br><br>
        <label for="file_name">Custom File Name</label><br>
        <input type="text" name="file_name" required><br><br>
        <button class="cyan-btn" type="submit">Upload</button>
    </form>
</div>

<?php
// Include the footer file
include '../partials/footer.php';
?>