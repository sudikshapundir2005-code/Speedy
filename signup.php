<?php
include "db.php";

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users(name,mobile,password)
    VALUES('$name','$mobile','$password')");

    echo "Signup Successful 🚀";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>

<style>
body{
background-image:url('uploads/background image.jpg');
background-size:cover;
background-position:center;
background-repeat:no-repeat;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family:Arial,sans-serif;
}

.container{
background:rgba(255,255,255,0.9);
padding:30px;
border-radius:15px;
width:350px;
box-shadow:0 5px 15px rgba(0,0,0,0.3);
backdrop-filter:blur(5px);
}

h2{
text-align:center;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:8px;
}

button{
width:100%;
padding:10px;
background:#007bff;
color:white;
border:none;
border-radius:8px;
cursor:pointer;
}
</style>

</head>

<body>

<div class="container">

<h2>Create Account</h2>

<form method="POST">

<input name="name" placeholder="Enter Name">

<input name="mobile" placeholder="Enter Mobile">

<input type="password" name="password" placeholder="Enter Password">

<div class="form-group" style="margin: 10px 0;">
    <label style="display:block; margin-bottom:5px;">Register As:</label>
    <select name="role" required style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
        <option value="consumer">Consumer (Buyer)</option>
        <option value="retailer">Retailer (Seller)</option>
    </select>
</div>

<button name="signup">Signup</button>

</form>

</div>

</body>
</html>