<?php
<<<<<<< HEAD

$servername = "localhost";
$username = "root"; // Default MySQL username
$password = ""; // Default MySQL password (empty for XAMPP/WAMP)
$dbname = "product-price-comparison"; // Your database name
=======
$servername = "localhost";
$username = "root"; // Default MySQL username
$password = ""; // Default MySQL password (empty for XAMPP/WAMP)
$dbname = "price_comparison"; // Your database name
>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
