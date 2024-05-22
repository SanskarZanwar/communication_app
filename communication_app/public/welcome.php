<!-- public/welcome.php -->

<!-- A div that centers its content and moves it down the page -->
<div style="text-align: center; margin-top: 10%;">
    <!-- If the 'logout' GET parameter is set and equals 'success', display a logout success message -->
    <?php if (isset($_GET['logout']) && $_GET['logout'] == 'success'): ?>
        <p style="color: green;">You have been logged out successfully.</p>
    <?php endif; ?>
    <!-- A welcome message -->
    <h1>Welcome to Users Module</h1>
    <!-- A section for existing users with a link to the login page -->
    <div>
        <h2>Existing Users</h2>
        <a href="login.php"><button>Login</button></a>
    </div>
    <!-- A section for new users with a link to the registration page -->
    <div>
        <h2>New Users</h2>
        <a href="register.php"><button>Register</button></a>
    </div>
</div>