<?php

$conn = mysqli_connect("localhost","root", "root123", "assign");
if(isset($_GET['submit'])) {
	$name = $_GET['name'];
	$email = $_GET['email'];
	$city = $_GET['city'];
	$sql = " INSERT INTO data (id, name, email,city) Values (' ', '$name', '$email', '$city')";
	$pass = mysqli_query($conn, $sql);
	echo "balle";
}

?>