<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $query = "INSERT INTO orders (customer_name, address, status) VALUES ('$name', '$address', 'Pending')";
    
    if (mysqli_query($conn, $query)) {

        unset($_SESSION['cart']);
        echo "<h2>✅ Order Placed Successfully!</h2>";
        echo "<a href='products.php'>Back to Products</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>