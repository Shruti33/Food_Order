<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'food_order');

// Retrieve the cart items from the database
$result = mysqli_query($conn, 'SELECT * FROM cart');

// Loop through the items and output them as table rows

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['count'] . '</td>';
    echo '<td>' . $row['item_description'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '<td><button class="btn btn-danger" onclick="deleteCartItem(\'' . $row['item_description'] . '\')">Delete</button></td>';
    echo '<td><button class="btn btn-primary" onclick="updateCount(\'' . $row['item_description'] . '\', \'increment\')">+</button> <button class="btn btn-secondary" onclick="updateCount(\'' . $row['item_description'] . '\', \'decrement\')">-</button></td>';
    echo '</tr>';
}

function is_authorized($user_id, $page_id) {
    $conn = mysqli_connect("localhost", "username", "password", "my_db");
    $sql = "SELECT COUNT(*) FROM permissions WHERE user_id = $user_id AND page_id = $page_id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_array($result)[0] > 0;
}

$user_id = $_SESSION['user_id'];
$page_id = $_GET['page_id'];
if (!is_authorized($user_id, $page_id)) {
    header('Location: /unauthorized.php');
    exit;
}

// Close the database connection
mysqli_close($conn);
?>
