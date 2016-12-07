<?php
if(isset($_POST['uid'])) {
$delete = $_POST['uid'];

$link = mysqli_connect( "localhost", "root", "aditya337", "assignment");
if($link === false){
	die( "ERROR: Could not connect. " . mysqli_connect_error());
}
if ( isset($delete)) {
	$query = "DELETE FROM info WHERE ID = $delete";

	mysqli_query( $link, $query);
	header('Location: newassignment.php');
}
}
?>