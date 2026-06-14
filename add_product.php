<?php
session_start();
include "db.php";
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'retailer') 
{
    header("Location: login.php");
    exit();
}
$message = "";
if (isset($_POST['add_product'])) 
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image_name);
    if (!is_dir($target_dir)) 
    {
        mkdir($target_dir, 0777, true);
    }
    if (move_uploaded_file($image_tmp, $target_file)) 
    {
        $query = "INSERT INTO products (name, price, image, category_id) VALUES ('$name', '$price', '$target_file', 0)";
        if (mysqli_query($conn, $query)) 
        {
            $message = "<div class='alert alert-success'>Product Added Successfully! 🎉</div>";
        } 
        else 
        {
            $message = "<div class='alert alert-danger'>Database Error: " . mysqli_error($conn) . "</div>";
        }
    }
} 
else 
    {
        $message = "<div class='alert alert-danger'>Failed to upload image.</div>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Speedy Retailer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body 
        {
            font-family: 'Poppins', sans-serif;
            background: #f4f7f6;
            padding-top: 50px;
        }
        .form-container 
        {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .btn-custom 
        {
            background: #2b3a4a;
            color: white;
            border-radius: 8px;
        }
        .btn-custom:hover 
        {
            background: #1d2733;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 form-container">
            <h3 class="text-center mb-4" style="color: #2b3a4a; font-weight: 600;">➕ Add New Product</h3>
            <?php echo $message; ?>
            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="e.g., Fresh Tomato" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price (INR)</label>
                    <input type="number" name="price" class="form-control" placeholder="e.g., 40" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="Vegetables">Vegetables 🥦</option>
                        <option value="Fruits">Fruits 🍎</option>
                        <option value="Dairy">Dairy Products 🥛</option>
                        <option value="Bakery">Bakery 🍞</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="add_product" class="btn btn-custom btn-lg">Upload Product</button>
                    <a href="retailer_dashboard.php" class="btn btn-light">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>