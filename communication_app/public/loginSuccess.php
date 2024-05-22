<!-- public/loginSuccess.php -->
<?php
// Start the session
session_start();
// If the user_id session variable is not set
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header('Location: login.php');
    // Stop the script
    exit();
}
?>
<!-- Include the header partial -->
<?php include '../partials/header.php'; ?>
<!-- Content container -->
<div class="content">
    <!-- Login successful title -->
    <h1>Login Successful</h1>
    <!-- Welcome message with the user's email -->
    <p>Welcome, <?php echo $_SESSION['email']; ?>!</p>
</div>
<!-- Include the footer partial -->
<?php include '../partials/footer.php'; ?>