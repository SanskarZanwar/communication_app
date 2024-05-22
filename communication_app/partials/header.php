<!-- partials/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Make the webpage responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communication Application</title>
    <!-- Link to the external CSS file. Adjust the path as needed -->
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Set the font of the body */
        body {
            font-family: Arial, sans-serif;
        }
        /* Set the display, justify content, background color, padding, and border of the navbar */
        .navbar {
            display: flex;
            justify-content: space-around;
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        /* Set the text decoration, color, padding, border, and transition of the links in the navbar */
        .navbar a {
            text-decoration: none;
            color: black;
            padding: 10px 20px;
            border: 1px solid transparent;
            transition: border 0.3s;
        }
        /* Change the border of the links in the navbar when they are hovered over */
        .navbar a:hover {
            border: 1px solid #000;
        }
        /* Set the text alignment and top margin of the content */
        .content {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- The navbar with links to the group chat, user management, document management, and logout pages -->
    <div class="navbar">
        <a href="chat.php">Group Chat</a>
        <a href="userList.php">Manage Users</a>
        <a href="uploadList.php">Manage Documents</a>
        <a href="logout.php">Logout</a>
    </div>