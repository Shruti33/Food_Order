<?php
  session_start();
  
  // Check if the item_description parameter was passed
  if (isset($_POST['item_description'])) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'food_order');

    // Sanitize the item_description parameter
    $itemDescription = $_POST['item_description'];

    // Check if the CSRF token is present and correct
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
      // Delete the item from the database
      $result = mysqli_query($conn, "DELETE FROM cart WHERE item_description='$itemDescription'");

      // Check if the deletion was successful
      if ($result) {
        echo 'success';
      } else {
        echo 'An error occurred while deleting the item from your cart. Please try again later.';
      }

      // Close the database connection
      mysqli_close($conn);
    } else {
      echo 'Invalid CSRF token';
    }
  } else {
    echo 'Invalid request. Please try again later.';
  }
?>
