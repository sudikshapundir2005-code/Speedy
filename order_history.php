<?php
session_start();
include "conn.php";

$query = "SELECT * FROM orders ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Order History</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f4; }
        h2 { color: #333; }
        .order-table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .order-table th, .order-table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        .order-table th { background-color: #333; color: white; }
    </style>
</head>
<body>

    <h2>🛍️ Your Order History</h2>

    <table class="order-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Delivery Address</th>
                <th>Total Amount</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>#<?php echo $row['id']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>₹<?php echo $row['total_amount']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5' style='text-align:center; padding:20px;'>Aapne abhi tak koi order nahi kiya hai.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="dashboard.php" style="text-decoration: none; color: blue;">← Back to Dashboard</a>

</body>
</html>