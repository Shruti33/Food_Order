<?php
// Connect to database
$db = new mysqli('localhost', 'root', '', 'food_order');

// Check for errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Delete all rows in the cart table
$db->query("DELETE FROM cart");


// Close database connection
$db->close();
header("Location: cart.php");
?>


