<?php
// Start a new session or resume the existing one
session_start();

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user list from the database
// Assuming $pdo is your PDO connection object
require '../config/config.php';

$stmt = $pdo->query("SELECT id, full_name, email FROM users");
$users = $stmt->fetchAll();
?>

<!-- Include the header partial -->
<?php include '../partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        /* General styles for the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        /* Styles for the content class */
        .content {
            padding: 20px;
        }
        /* Styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        /* Styles for table headers and cells */
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        /* Styles for table headers */
        th {
            background-color: #f2f2f2;
        }
        /* Styles for links */
        a {
            text-decoration: none;
            color: #007bff;
        }
        /* Styles for links on hover */
        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        /* Function to confirm user deletion */
        function confirmDeletion(event) {
            if (!confirm("Confirm User Deletion\n\nAre you sure you want to delete this user?")) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
<div class="content">
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>User Email ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <!-- Output the user's full name and email, escaped to prevent XSS -->
                    <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td>
                        <!-- Links to edit and delete the user -->
                        <a href="editUser.php?id=<?php echo $user['id']; ?>">Edit</a> |
                        <a href="deleteUser.php?id=<?php echo $user['id']; ?>" onclick="confirmDeletion(event)">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<!-- Include the footer partial -->
<?php include '../partials/footer.php'; ?>