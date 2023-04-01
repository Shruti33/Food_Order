<?php
// Check if the item_description and action parameters were passed
if (isset($_POST['item_description']) && isset($_POST['action'])) {
  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'food_order');

  // Sanitize the item_description parameter
  $item_description = $_POST['item_description'];

  // Update the count in the database
  if ($_POST['action'] === 'increment') {
    $result = mysqli_query($conn, "UPDATE cart SET count = count + 1 WHERE item_description='$item_description'");
  } else if ($_POST['action'] === 'decrement') {
    // Retrieve the current count from the database
    $count_result = mysqli_query($conn, "SELECT count FROM cart WHERE item_description='$item_description'");
    $count_row = mysqli_fetch_assoc($count_result);
    $count = $count_row['count'];

    // Check if the new count is greater than 0
    if ($count > 1) {
      $result = mysqli_query($conn, "UPDATE cart SET count = count - 1 WHERE item_description='$item_description'");
    } else {
      $result = mysqli_query($conn, "DELETE FROM cart WHERE item_description='$item_description'");
    }
  }

  // Check if the update was successful
  if ($result) {
    // Retrieve the updated count from the database
    $count_result = mysqli_query($conn, "SELECT count FROM cart WHERE item_description='$item_description'");
    $count_row = mysqli_fetch_assoc($count_result);
    $count = $count_row['count'];

    // Return the updated count to the AJAX request
    echo $count;
  } else {
    echo 'An error occurred while updating the item count. Please try again later.';
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  echo 'Invalid request. Please try again later.';
}
?>