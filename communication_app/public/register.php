<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Set the viewport to scale to the width of the device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Styles for the body */
        body {
            font-family: Arial, sans-serif;
        }
        /* Styles for the content class */
        .content {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Styles for the h1 tag */
        .content h1 {
            text-align: center;
        }
        /* Styles for the div tag */
        .content div {
            margin-bottom: 15px;
        }
        /* Styles for the label tag */
        .content label {
            display: block;
            margin-bottom: 5px;
        }
        /* Styles for the text, email, and password input fields */
        .content input[type="text"],
        .content input[type="email"],
        .content input[type="password"] {
            width: calc(100% - 12px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        /* Styles for the button */
        .content button {
            width: 100%;
            padding: 10px;
            background-color: cyan;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Content container -->
    <div class="content">
        <!-- Register title -->
        <h1>Register</h1>
        <!-- Register form -->
        <form action="insertUser.php" method="POST">
            <!-- Full name input field -->
            <div>
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <!-- Email input field -->
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <!-- Password input field -->
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <!-- Confirm password input field -->
            <div>
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <!-- Register button -->
            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
    <!-- Include the footer partial -->
    <?php include '../partials/footer.php'; ?>
</body>
</html>