<?php 
session_start();
require 'connect.php';
require 'item.php';


// Clear all product in cart
unset($_SESSION['cart']);
 ?>
 Thanks for buying products. Click <a href="index.php">here</a> to continue purchasing products.