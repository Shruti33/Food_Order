<?php

$item_description = $_POST['item_description'];
$price = $_POST['price'];

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

// Check if item already exists in cart
$sql = "SELECT * FROM cart WHERE item_description = '$item_description'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Item already exists, increment count
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'] + 1;
    $sql = "UPDATE cart SET count = $count WHERE item_description = '$item_description'";
} else {
    // Item does not exist, insert into cart
    $sql = "INSERT INTO cart (item_description, price, count) VALUES ('$item_description', $price, 1)";
}

if (mysqli_query($conn, $sql)) {
    echo "Item added to cart successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>
