<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['login']) || $_SESSION['login'] !== TRUE) {
    // User not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// If the user is logged in, set price alert logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['setPriceAlert'])) {
    // You can add code here to handle actual price alert logic (e.g., insert into database)
    
    // Show success message and redirect to home or another page
    $_SESSION['alert_message'] = "Price alert successfully set!";
    header("Location: index.php");
    exit();
}
?>
