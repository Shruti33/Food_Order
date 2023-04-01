// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fod_order";
$conn = new mysqli($servername, $username, $password, $dbname);

// Call the stored procedure
$total = 0;
$stmt = $conn->prepare("CALL calculate_cart_total(?)");
$stmt->bind_param("d", $total);
$stmt->execute();
$stmt->bind_result($total);
$stmt->fetch();

// Close the statement and the database connection
$stmt->close();
$conn->close();

// Display the total
echo $total;
