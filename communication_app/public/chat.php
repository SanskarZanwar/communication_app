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

// Get the logged-in user's name
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT full_name FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>

<!-- Include the header partial -->
<?php include '../partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Chat</title>
    <style>
        /* Styles for the body */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        /* Styles for the center class */
        .center {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        /* Styles for the h2 and h3 tags */
        h2, h3 {
            margin: 0 0 20px;
            text-align: center;
        }
        /* Styles for the chat-form class */
        .chat-form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        /* Styles for the textarea in the chat-form class */
        .chat-form textarea {
            width: 60%;
            height: 50px;
            resize: none;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        /* Styles for the button in the chat-form class */
        .chat-form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #00cccc;
            color: white;
            cursor: pointer;
        }
        /* Styles for the button hover state in the chat-form class */
        .chat-form button:hover {
            background-color: #009999;
        }
        /* Styles for the messages class */
        .messages {
            margin-top: 20px;
            max-height: 400px;
            overflow-y: auto;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        /* Styles for the message class */
        .message {
            margin-bottom: 15px;
        }
        /* Styles for the strong tag in the message class */
        .message strong {
            display: block;
            color: #333;
        }
        /* Styles for the time tag in the message class */
        .message time {
            font-size: 0.9em;
            color: #999;
            display: block;
        }
        /* Styles for the p tag in the message class */
        .message p {
            margin: 5px 0 0;
        }
    </style>
    <script>
        // Function to refresh the page
        function refreshPage() {
            window.location.reload();
        }
    </script>
</head>
<body>
<div class="center">
    <h2>Group Chat</h2>
    <div class="messages">
        <?php
        // Fetch and display the chat messages
        $stmt = $pdo->query("SELECT users.full_name, chats.message, chats.created_at FROM chats JOIN users ON chats.user_id = users.id ORDER BY chats.created_at DESC");
        while ($row = $stmt->fetch()) {
            if ($row) {
                echo "<div class='message'><time>{$row['created_at']}</time><strong>{$row['full_name']}</strong><p>{$row['message']}</p></div>";
            }
        }
        ?>
    </div>
    <div class="chat-form">
        <!-- Display the logged-in user's name and a textarea for the message -->
        <label><strong><?php echo htmlspecialchars($user['full_name']); ?>:</strong></label>
        <textarea name="message" form="chat-form" required></textarea>
        <!-- Buttons to send the message and refresh the page -->
        <button type="submit" form="chat-form" class="cyan-btn">Send</button>
        <button type="button" class="cyan-btn" onclick="refreshPage()">Refresh</button>
    </div>
    <!-- Form to submit the chat message -->
    <form id="chat-form" action="insertChat.php" method="post"></form>
</div>
</body>
</html>

<!-- Include the footer partial -->
<?php include '../partials/footer.php'; ?>