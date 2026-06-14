<?php
session_start();
include "db.php";
if (isset($_POST['login'])) {
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE mobile = '$mobile'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] == 'retailer') { header("Location: view_orders.php"); } 
        else { header("Location: dashboard.php"); }
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background-image:url('uploads/background login.jpg');
background-size:cover;
background-position:center;
background-repeat:no-repeat;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.container{
background:rgba(255,255,255,0.85);
padding:30px;
width:380px;
border-radius:20px;
box-shadow:0 8px 25px rgba(0,0,0,0.3);
backdrop-filter:blur(8px);
}

h2{
text-align:center;
margin-bottom:20px;
color:#333;
}

input{
width:100%;
padding:12px;
margin:10px 0;
border:1px solid #ccc;
border-radius:8px;
}

button{
width:100%;
padding:12px;
background:#007bff;
color:white;
border:none;
border-radius:8px;
cursor:pointer;
font-size:16px;
}

button:hover{
background:#0056b3;
}

.error{
color:red;
text-align:center;
margin-bottom:10px;
}

.signup-link{
text-align:center;
margin-top:15px;
}

.signup-link a{
text-decoration:none;
color:#007bff;
}

</style>

</head>

<body>

<div class="container">

<h2>Login 🚀</h2>

<?php
if(isset($error)){
    echo "<p class='error'>$error</p>";
}
?>

<form method="POST">

<input type="text"
name="mobile"
placeholder="Enter Mobile Number"
required>

<input type="password"
name="password"
placeholder="Enter Password"
required>

<button type="submit" name="login">
Login
</button>

</form>

<div class="signup-link">
Don't have an account?
<a href="signup.php">Signup</a>
</div>

</div>

</body>
</html>