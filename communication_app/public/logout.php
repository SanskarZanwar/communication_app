<?php
// Start the session
session_start();
// Destroy all data registered to the session
session_destroy();
// Redirect the user to the welcome page with a logout success message
header("Location: welcome.php?logout=success");
// Stop the script
exit();
?>