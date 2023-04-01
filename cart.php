<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- For the toasts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />


  <title>Food ordering</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Give Me Food</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.html">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./directions.html">Directions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./hours.html">Hours</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact.html">Contact Us</a>
          </li>
        </ul>
      <span class="navbar-text">
        <a href="cart.php" id="cart_button" class="btn btn-light" style="color:black;">My Cart <i
            class="fa fa-shopping-cart" style="font-size:24px;"></i></a>
        <button type="button" class="btn btn-dark" onclick="logout()">Logout</button>
      </span>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item Description</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="cart_body">
          <?php include 'get_cart_items.php'; ?>
        </tbody>
      </table>

      <h3>Total: <span class="badge badge-primary" id="total">
          <?php include 'get_cart_total.php'; ?>
        </span></h3>
    </div>

    <div class="row justify-content-center">
      <?php
          // Connect to the database
          $conn = mysqli_connect('localhost', 'root', '', 'food_order');

          // Retrieve the cart items from the database
          $result = mysqli_query($conn, 'SELECT * FROM cart');
          // Close the database connection
          mysqli_close($conn);
        ?>
      <form id="checkout_form" method="POST" action="cart_print.php">
          <?php if (mysqli_num_rows($result) > 0) { ?>
              <button id="checkout_button" type="submit" class="btn btn-success">Checkout</button>
          <?php } else { ?>
              <button id="checkout_button" type="button" class="btn btn-success" disabled>Add items to Cart</button>
          <?php } ?>
      </form>
    </div>
  </div>



  <footer>
    <div class="container">
      <p>&copy; 2023 Pizza Time</p>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
</body>

</html>