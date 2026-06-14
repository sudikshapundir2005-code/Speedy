<?php
session_start();
include "db.php";
$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Cart</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-4">
<div>
<h2>🛒 Your Cart</h2>
<p class="text-muted">📍 Current Location</p>
</div>
<a href="products.php" class="btn btn-primary">Continue Shopping</a>
</div>
<table class="table table-bordered table-striped bg-white">
<tr>
    <th>Image</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Action</th>
</tr>
<?php
if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
{
foreach($_SESSION['cart'] as $key=>$id)
{
$res=mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
if(mysqli_num_rows($res)>0)
{
$row=mysqli_fetch_assoc($res);
$total += $row['price'];
?>
<tr>
<td>
<img src="uploads/<?php echo $row['image']; ?>"
width="80"
height="80"
style="object-fit:contain;">
</td>
<td>
<?php echo $row['name']; ?>
</td>
<td>
₹<?php echo $row['price']; ?>
</td>
<td>
<a href="remove_from_cart.php?index=<?php echo $key; ?>"class="btn btn-danger btn-sm">Remove</a>
</td>
</tr>
<?php
}
}
}
else
{
?>
<tr>
    <td colspan="4" class="text-center">Your Cart is Empty</td>
</tr>
<?php
}
?>
</table>
<h4 class="mt-3">Total Amount :₹<?php echo $total; ?></h4>
<div class="mt-3">
<a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
</div>
</div>
</body>
</html>