<?php
$servername = 'localhost';
$username = 'root';
$password = 's3cr3t';
$db = 'makeup';
// Create connection
$con = mysqli_connect($servername, $username, $password, $db);
 // Check connection
if (!$con) {
	die ("connection failed.". mysqli_connect_error()); //close connection
}
 ?>