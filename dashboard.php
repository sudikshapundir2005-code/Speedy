<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
if($_SESSION['role']!== 'consumer'){
    header("Location: view_orders.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background-image:url('uploads/bg.jpg');
background-size:cover;
background-position:center;
background-repeat:no-repeat;
min-height:100vh;
}

.navbar{
background:rgba(0,123,255,0.9);
padding:15px 30px;
display:flex;
justify-content:space-between;
align-items:center;
}

.logo{
color:white;
font-size:28px;
font-weight:bold;
}

.nav-links a{
color:white;
text-decoration:none;
margin-left:20px;
font-size:16px;
}

.nav-links a:hover{
text-decoration:underline;
}

.welcome-box{
width:90%;
max-width:900px;
margin:40px auto;
background:rgba(255,255,255,0.9);
padding:30px;
border-radius:20px;
text-align:center;
box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

.welcome-box h1{
color:#333;
margin-bottom:10px;
}

.cards{
display:flex;
justify-content:center;
gap:20px;
flex-wrap:wrap;
margin-top:30px;
}

.card{
width:220px;
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.15);
transition:0.3s;
text-align:center;
}

.card:hover{
transform:translateY(-8px);
}

.card h3{
margin-bottom:10px;
}

.btn{
display:inline-block;
margin-top:10px;
padding:10px 20px;
background:#007bff;
color:white;
text-decoration:none;
border-radius:8px;
}

.btn:hover{
background:#0056b3;
}

</style>

</head>

<body>

<div class="navbar">

<div class="logo">🚀 Speedy</div>

<div class="nav-links">
<a href="dashboard.php">Dashboard</a>
<a href="products.php">Products</a>
<a href="cart.php">Cart</a>
<a href="checkout.php">Orders</a>
<a href="logout.php">Logout</a>
</div>

</div>

<div class="welcome-box">

<h1>Welcome, <?php echo $_SESSION['user_id']; ?> 👋</h1>

<p>You are logged in successfully.</p>

<div class="cards">

<div class="card">
<h3>🛒 Products</h3>
<p>View all products</p>
<a href="products.php" class="btn">Open</a>
</div>

<div class="card">
<h3>🛍 Cart</h3>
<p>Manage your cart</p>
<a href="cart.php" class="btn">Open</a>
</div>

<div class="card">
<h3>📦 Orders</h3>
<p>Place and track orders</p>
<a href="order_history.php" class="btn">Open</a>
</div>

</div>

</div>

</body>
</html>