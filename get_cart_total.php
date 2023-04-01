<?php

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get total count of items in cart
$sql = "SELECT SUM(price*count) as total FROM cart WHERE order_id=" . $_GET['order_id'];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['total'];
} else {
    echo "0";
}

mysqli_close($conn);

?>
