<?php

$conn = mysqli_connect( "localhost", "root", "aditya337", "assignment");
if($conn === false){
	die( "ERROR: Could not connect. " . mysqli_connect_error());
}


if(isset($_GET['id'])) {
$delete = $_GET['id'];
if ( isset($delete)) {
	$query = "DELETE FROM info WHERE ID = $delete";

	mysqli_query( $conn, $query);
	header('location: input.php');
}
}






?>