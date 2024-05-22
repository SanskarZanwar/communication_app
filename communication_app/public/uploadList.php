<?php
// Start a new session or resume the existing one
session_start();

// If the user is not logged in, redirect to the welcome page
if (!isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

// Include the configuration file
include '../config/config.php';
?>

<!-- Include the header partial -->
<?php include '../partials/header.php'; ?>

<!-- CSS styles for the page -->
<style>
    /* General styles for the body */
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 0;
    }
    /* Styles for the center class */
    .center {
        width: 80%;
        margin: auto;
        text-align: center;
        padding: 20px;
    }
    /* Styles for the table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    /* Styles for table headers and cells */
    th, td {
        padding: 15px;
        text-align: left;
        border: 1px solid #ddd;
    }
    /* Styles for table headers */
    th {
        background-color: #f2f2f2;
    }
    /* Styles for links in table cells */
    td a {
        color: #00bfff;
        text-decoration: none;
        margin-right: 10px;
    }
    /* Styles for links in table cells on hover */
    td a:hover {
        text-decoration: underline;
    }
    /* Styles for the upload popup */
    #uploadPopup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        z-index: 1000;
    }
    /* Styles for the form container */
    .form-container {
        text-align: left;
    }
    /* Styles for buttons */
    .form-container button {
        background-color: #00bfff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }
    /* Styles for buttons on hover */
    .form-container button:hover {
        background-color: #009acd;
    }
    /* Styles for the bottom center button */
    .bottom-center-button {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #00bfff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }
    /* Styles for the bottom center button on hover */
    .bottom-center-button:hover {
        background-color: #009acd;
    }
</style>

<!-- HTML for the document management table -->
<div class="center">
    <h2>Manage Documents</h2>
    <table>
        <tr>
            <th>Label</th>
            <th>File Name</th>
            <th>Actions</th>
        </tr>
        <?php
        // Query the database for all uploads
        $stmt = $pdo->query("SELECT * FROM uploads");
        // Loop through each upload
        while ($row = $stmt->fetch()) {
            // Extract the label from the file name
            $file_name = $row['file_name'];
            $label = pathinfo($file_name, PATHINFO_FILENAME);
            // Output a table row for the upload
            echo "<tr>
                    <td>{$label}</td>
                    <td>{$file_name}</td>
                    <td>
                        <a href='editUpload.php?id={$row['id']}'>Edit</a>
                        <a href='#' onclick='confirmDelete({$row['id']})'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>

<!-- HTML for the upload popup -->
<div id="uploadPopup">
    <div class="form-container">
        <h2>Add New Upload</h2>
        <form action="addUpload.php" method="post" enctype="multipart/form-data">
            <label for="file">File</label><br>
            <input type="file" name="file" required><br>
            <label for="file_name">File Name</label><br>
            <input type="text" name="file_name" required><br>
            <button type="submit">Upload</button>
            <button type="button" onclick="hideUploadPopup()">Cancel</button>
        </form>
    </div>
</div>

<!-- Button for showing the upload popup -->
<button class="bottom-center-button" onclick="showUploadPopup()">Add Upload</button>

<!-- JavaScript for showing and hiding the upload popup, and confirming file deletion -->
<script>
function showUploadPopup() {
    document.getElementById('uploadPopup').style.display = 'block';
}

function hideUploadPopup() {
    document.getElementById('uploadPopup').style.display = 'none';
}

function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this file?')) {
        window.location.href = 'deleteUpload.php?id=' + id;
    }
}
</script>

<!-- Include the footer partial -->
<?php include '../partials/footer.php'; ?>