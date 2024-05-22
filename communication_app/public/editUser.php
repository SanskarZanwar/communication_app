<?php
// Start a new session or resume the existing one
session_start();

// If the user is not logged in, redirect to the welcome page
if (!isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

// Include the database configuration file
include '../config/config.php';

// Get the user ID from the URL
$id = $_GET['id'];

// If the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted full name and email
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    // Prepare an SQL statement to update the user's full name and email
    $stmt = $pdo->prepare("UPDATE users SET full_name = ?, email = ? WHERE id = ?");
    // Execute the SQL statement with the submitted full name, email, and user ID
    $stmt->execute([$full_name, $email, $id]);

    // Redirect to the user list page
    header("Location: userList.php");
    exit();
}

// Prepare an SQL statement to select the user's data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
// Execute the SQL statement with the user ID
$stmt->execute([$id]);
// Fetch the user's data
$user = $stmt->fetch();
?>

<!-- Include the header partial -->
<?php include '../partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        /* Styles for the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        /* Styles for the form-container class */
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
            text-align: center;
        }
        /* Styles for the h2 tag */
        h2 {
            margin-bottom: 20px;
            margin-top: -10%;
        }
        /* Styles for the form */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* Styles for the label */
        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        /* Styles for the input */
        input {
            padding: 10px;
            width: 300px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        /* Styles for the cyan-btn class */
        .cyan-btn {
            background-color: cyan;
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        /* Styles for the cyan-btn hover state */
        .cyan-btn:hover {
            background-color: #17a2b8;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit User Information</h2>
        <!-- Form to submit the updated user information -->
        <form action="" method="post">
            <!-- Input for the full name -->
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
            <!-- Input for the email -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            <!-- Button to submit the form -->
            <button class="cyan-btn" type="submit">Save</button>
        </form>
    </div>
</body>
</html>

<!-- Include the footer partial -->
<?php include '../partials/footer.php'; ?>