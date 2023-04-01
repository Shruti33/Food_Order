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
    <style>
        body {
            background-color: lightcyan;
        }
        #checkout_button {
            font-weight: bold;
            font-size: 34px;
            background-color: red;
        }
        .table tbody tr {
            border-bottom: 1px solid #ccc;
            font-size: 23px;
            font: bold;
        }
    </style>


    <title>Food ordering</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
        <table class="table">
            
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item Description</th>
                <th scope="col">Price</th>
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
            <form id="checkout_form" method="POST" action="checkout.php">
            <button id="checkout_button" type="submit" class="btn btn-success btn-block">Confirm Order</button>
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
</body>

</html>