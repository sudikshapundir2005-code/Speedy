<?php
session_start();
include "db.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'retailer') {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $delete_query = "DELETE FROM products WHERE id = '$delete_id'";
    if (mysqli_query($conn, $delete_query)) {
        $message = "<div class='alert alert-success'>Product Deleted Successfully! 🗑️</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error deleting product: " . mysqli_error($conn) . "</div>";
    }
}

$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Speedy Retailer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7f6;
            padding-top: 30px;
        }
        .table-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #bd2130;
            color: white;
        }
        .header-title {
            color: #2b3a4a;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="header-title m-0">📦 Manage Your Products</h3>
            <a href="retailer_dashboard.php" class="btn btn-outline-secondary">Back to Dashboard</a>
        </div>

        <?php echo $message; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price (INR)</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $image_src = $row['image'];
                            if (!str_contains($image_src, 'uploads/')) {
                                
                                $image_src = "uploads/" . $row['image'];
                            }
                    ?>
                    <tr>
                        <td><strong>#<?php echo $row['id']; ?></strong></td>
                        <td>
                            <img src="<?php echo $image_src; ?>" onerror="this.src='https://placehold.co/60x60?text=No+Img'" class="product-img" alt="Product">
                        </td>
                        <td><?php echo $row['name']; ?></td>
                        <td>₹<?php echo $row['price']; ?></td>
                        <td class="text-center">
                            <a href="manage_products.php?delete_id=<?php echo $row['id']; ?>" 
                               class="btn btn-delete btn-sm px-3" 
                               onclick="return confirm('Are you sure you want to delete this product?');">
                               Delete
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center text-muted py-4'>No products found. Add some from the dashboard!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>