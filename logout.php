<?php
// Start the session
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to the login page or homepage
header("Location: index.php"); // or replace with your preferred page
exit;
?>