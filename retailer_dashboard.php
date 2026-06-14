<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'retailer') {
    header("Location: login.php");
    exit();
}
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retailer Dashboard - Speedy</title>
    <style>
        body 
        { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            padding: 0; background-color: #f4f7f6; 
        }
        .navbar 
        { 
            background-color: #2c3e50; 
            color: white; 
            padding: 15px 30px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
        }
        .navbar h2 
        { 
            margin: 0; 
            font-size: 24px; 
        }
        .navbar a 
        { 
            color: #fff; 
            text-decoration: none; 
            background: #e74c3c; 
            padding: 8px 15px; 
            border-radius: 4px; 
            font-weight: bold; 
            transition: 0.3s; 
        }
        .navbar a:hover 
        { 
            background: #c0392b; 
        }
        .container 
        { 
            padding: 40px; 
            text-align: center; 
        }
        .welcome-box 
        { 
            background: white; 
            padding: 40px; 
            border-radius: 10px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
            display: inline-block; 
            width: 85%; 
            max-width: 900px; 
        }
        .welcome-box h3 
        { 
            color: #2c3e50; 
            margin-top: 0; 
            font-size: 28px; 
        }
        .cards 
        { 
            display: flex; 
            justify-content: space-between; 
            margin-top: 40px; 
            flex-wrap: wrap; 
        }
        .card 
        { 
            background: #fff; 
            padding: 25px; 
            border-radius: 8px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.08); 
            width: 28%; 
            min-width: 220px; 
            margin: 10px; 
            border-top: 5px solid #34495e; 
            transition: transform 0.2s; 
        }
        .card:hover 
        { 
            transform: translateY(-5px); 
        }
        .card h3 
        { 
            color: #2c3e50; 
            font-size: 20px; 
            margin-bottom: 10px; 
        }
        .card p 
        { 
            color: #7f8c8d; 
            font-size: 14px; 
            line-height: 1.5; 
        }
        .btn 
        { 
            display: inline-block; 
            background-color: #2c3e50; 
            color: white; 
            padding: 10px 25px; 
            text-decoration: none; 
            border-radius: 4px; 
            margin-top: 15px; 
            font-weight: bold; 
            transition: 0.3s; 
        }
        .btn:hover 
        { 
            background-color: #1a252f; 
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>🏪 Speedy Retailer Panel</h2>
        <div>
            <span style="margin-right: 20px; font-weight: 500;">Welcome, <?php echo $_SESSION['user_name']; ?> (Seller)</span>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="welcome-box">
            <h3>Dashboard Overview</h3>
            <p style="color: #7f8c8d;">Apne stock aur business ko control karne ke liye neeche diye gaye tools ka use karein.</p>
            
            <div class="cards">
                <div class="card">
                    <h3>➕ Add Product</h3>
                    <a href="add_product.php" class="btn">Open</a>
                </div>
                
                <div class="card">
                    <h3>📦 Manage Products</h3>
                    <a href="manage_products.php" class="btn">Open</a>
                </div>

                <div class="card">
                    <h3>🛒 Customer Orders</h3>
                    
                    <a href="view_orders.php" class="btn">Open</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>