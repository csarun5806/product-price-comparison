<?php
session_start();  // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page (or any other page)
header("Location: login.php");
exit();
?>
