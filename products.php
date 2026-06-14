<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Our Products</h2>
    <div class="row">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM products");
        while($row = mysqli_fetch_assoc($res)) {

            $imageName = str_replace(' ', '.', $row['image']);
        ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100 p-3">
                <img src="uploads/<?php echo $imageName; ?>" class="card-img-top" style="height:150px; object-fit:contain;">
                <div class="card-body text-center">
                    <h5><?php echo $row['name']; ?></h5>
                    <p>₹<?php echo $row['price']; ?></p>
                    <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary w-100">Add to Cart</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>