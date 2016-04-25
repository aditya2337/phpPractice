<?php

include 'db.php';

if (isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction'] != '') {
	$actionfunction = $_REQUEST['actionfunction'];

	call_user_func($actionfunction, $_REQUEST, $conn);
}

function saveData($data, $conn) {

	$name = $conn->real_escape_string($data['fname']);
	$email = $conn->real_escape_string($data['email']);
	$city = $conn->real_escape_string($data['city']);
	$sql = "INSERT INTO info( Name, Email, City) VALUES('$name', '$email', '$city')";

	if($conn->query($sql)) {
		showData($data, $conn);
	} else {
		echo "error";
	}
}

function showData($data,$conn){
	$sql = "SELECT * FROM info";
	$data = mysqli_query($conn, $sql);
	$str = "<tr> <th> Id </th> <th> Name </th> <th> Email </th> <th> City </th> <th> Action </th> </tr>";
	if (mysqli_num_rows($data) > 0) {
		while ( $row = mysqli_fetch_array( $data)) {
			$uid = $row['ID'];
			$str .=  "<tr id = '".$uid."'>
			<td contenteditable = 'true'>" . $row['ID'] . "</td>
			<td>" . $row['Name'] . "</td>
			<td>" . $row['Email'] . "</td>
			<td>" . $row['City'] . "</td>
			<td><input type = 'button' value = 'edit' class='ajaxedit'> <input type = 'button' value = 'delete' data = '".$uid."' class = 'delete'></td>
		</tr>";
		}
	} else {
	echo $str .= "<td> No records were found</td>";
}
	echo $str;
}

function updateData($data,$conn){
 $fname = $conn->real_escape_string($data['fname']);
 $city = $conn->real_escape_string($data['city']);
 $email = $conn->real_escape_string($data['email']);
 $editid = $conn->real_escape_string($data['editid']);
 $sql = "UPDATE info SET Name='$fname',Email='$email',City='$city' WHERE ID=$editid";
 if($conn->query($sql)){
 showData($data,$conn);
 }
 else{
 echo "error";
 }
}

function deleteData($data, $conn) {
	$delid =  $conn->real_escape_string($data['deleteid']);
	$sql = "DELETE FROM info WHERE ID = $delid";
	if ($conn->query($sql)) {
		showData($data,$conn);
	}
	else {
		echo "error";
	}
}


/*if(isset($_POST['uid'])) {
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
}*/


/*if (isset($_POST['submit'])) {
	$name = $_POST['fname'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	

	$qry = "INSERT INTO info( Name, Email, City) VALUES('$name', '$email', '$city')";

	if(mysqli_query($conn, $qry)) {
	  echo "";
	}else
	echo "query not passed = ".mysqli_error($conn);
}*/
/*$conn = mysqli_connect( "localhost", "root", "aditya337", "assignment");
if($conn === false){
	die( "ERROR: Could not connect. " . mysqli_connect_error());
}*/
/*$self = $_SERVER["PHP_SELF"];
$sql = "SELECT * FROM info";

	echo "<table id='demoajax'  style = 'border: solid 1px black;' border = 1 cellpadding = '5px' cellspacing = '0px' align = 'center'>";
		echo "<tr> <th> Id </th> <th> Name </th> <th> Email </th> <th> City </th> <th> Action </th> </tr>";
		$result = mysqli_query($conn, $sql);
		while ( $row = mysqli_fetch_array( $result)) {
			$uid = $row['ID'];
			echo "<tr id = '".$uid."'>";
			  echo "<td>" . $row['ID'] . "</td>";
				echo "<td>" . $row['Name'] . "</td>";
				echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['City'] . "</td>";
				echo "<td><input type = 'button' value = 'edit' class='ajaxedit'> <input type = 'button' value = 'delete' data = '".$uid."' class = 'delete'></td>";
			echo "</tr>";
		}
	echo "</table>";*/





/*
$data = array();*/



/*updateData($data,$conn);*/

/*header('location: newassignment.php');*/

?>