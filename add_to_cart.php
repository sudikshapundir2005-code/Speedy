<?php
session_start();
if(isset($_GET['id'])) 
{
    if(!isset($_SESSION['cart'])) 
    {
        $_SESSION['cart'] = array();
    }
    $_SESSION['cart'][] = $_GET['id'];
}
header("Location: cart.php");
exit();
?>