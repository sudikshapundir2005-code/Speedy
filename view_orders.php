<?php
session_start();
include "db.php";

if (isset($_POST['update_status'])) {
    $oid = $_POST['order_id'];
    $st = $_POST['status'];

    mysqli_query($conn, "UPDATE orders SET status = '$st' WHERE id = '$oid'");
}

$orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4 bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Retailer Panel</a>

    <div class="navbar-nav">
      <a class="nav-link" href="view_orders.php">📦 View Orders</a>
      <a class="nav-link" href="manage_products.php">⚙️ Manage Products</a>
      <a class="nav-link" href="add_product.php">➕ Add Product</a>
      <a class="nav-link text-danger" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container bg-white p-4 shadow rounded">

    <h3 class="mb-4">🛍️ Customer Orders</h3>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User Details</th>
                <th>Location</th>
                <th>Status</th>
                <th>Update</th>
            </tr>
        </thead>

        <tbody>

        <?php while ($row = mysqli_fetch_assoc($orders)) { ?>

            <tr>
                <!-- ORDER ID -->
                <td>#<?php echo $row['id']; ?></td>

                <!-- USER INFO -->
                <td>
                    User ID: <?php echo $row['user_id']; ?>
                </td>

                <!-- LOCATION / MAP BUTTON -->
                <td>
                    <?php if (!empty($row['latitude']) && !empty($row['longitude'])) { ?>

                        <a target="_blank"
                            href="https://www.google.com/maps?q=<?php echo $row['latitude']; ?>,<?php echo $row['longitude']; ?>"
                            class="btn btn-primary btn-sm">
                            🗺️ View on Map
                        </a>

                        <br>
                        <small class="text-muted">
                            Lat: <?php echo $row['latitude']; ?><br>
                            Lng: <?php echo $row['longitude']; ?>
                        </small>

                    <?php } else { ?>
                        <span class="text-muted">📍 No Location Available</span>
                    <?php } ?>
                </td>

                <!-- STATUS -->
                <td>
                    <span class="badge bg-info text-dark">
                        <?php echo $row['status']; ?>
                    </span>
                </td>

                <!-- UPDATE STATUS -->
                <td>
                    <form method="POST">

                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">

                        <select name="status" class="form-select form-select-sm mb-2">
                            <option value="Pending">Pending</option>
                            <option value="Delivered">Delivered</option>
                        </select>

                        <button type="submit" name="update_status" class="btn btn-success btn-sm">
                            Update
                        </button>

                    </form>
                </td>
            </tr>

        <?php } ?>

        </tbody>
    </table>

</div>

</body>
</html>