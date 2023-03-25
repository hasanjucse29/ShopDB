<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Form data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer_id = $_POST["customer_id"];
  $order_date = $_POST["order_date"];
  $total_price = $_POST["total_price"];

  // SQL query to insert data into the Orders table
  $sql = "INSERT INTO Orders (customer_id, order_date, total_price)
  VALUES ('$customer_id', '$order_date', '$total_price')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
	header("Location: \shopDB\home.html");
	    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
