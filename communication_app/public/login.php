<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Set the viewport to scale to the width of the device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Styles for the body */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        /* Styles for the content class */
        .content {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        /* Styles for the h1 tag */
        .content h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        /* Styles for the div tag */
        .content div {
            margin-bottom: 15px;
        }
        /* Styles for the label tag */
        .content label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        /* Styles for the email and password input fields */
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
        /* Styles for the button hover state */
        .content button:hover {
            background-color: #00aaff;
        }
    </style>
</head>
<body>
    <!-- Content container -->
    <div class="content">
        <!-- Login title -->
        <h1>Login</h1>
        <!-- Login form -->
        <form action="checkLogin.php" method="POST">
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
            <!-- Login button -->
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>