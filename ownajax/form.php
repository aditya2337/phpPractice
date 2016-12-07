<?php



$conn = mysqli_connect( "localhost", "root", "aditya337", "assignment");
if($conn === false){
	die( "ERROR: Could not connect. " . mysqli_connect_error());
}
function showData($conn){
$sql = "SELECT * FROM info";
	$data = mysqli_query($conn, $sql);
	$str = "<table id='demoajax'  style = 'border: solid 1px black;' border = 1 cellpadding = '5px' cellspacing = '0px' align = 'center'>";
	$str .= "<tr> <th> Id </th> <th> Name </th> <th> Email </th> <th> City </th> <th> Action </th> </tr>";
	if (mysqli_num_rows($data) > 0) {
		while ( $row = mysqli_fetch_array( $data)) {
			$uid = $row['ID'];
			$str .=  "<tr id = '".$uid."'>
			<td>" . $row['ID'] . "</td>
			<td id = nam>" . $row['Name'] . "</td>
			<td>" . $row['Email'] . "</td>
			<td>" . $row['City'] . "</td>
			<td id = 'edit'><input type = 'button' value = 'edit' onclick = 'editFunction(".$uid.")' id = 'cancel'> <input type = 'button' data = $uid value = 'delete' onclick = 'deleteFunction(".$uid.")' id = 'delete'></td>
		</tr>";
		}
	} else {
	echo $str .= "<td> No records were found</td>";
}
$str .= "</table>";
echo $str;
}


if (isset($_GET['button'])) {
	$name = $_GET['name'];
	$email = $_GET['email'];
	$city = $_GET['city'];


	$sql = "INSERT INTO info( Name, Email, City) VALUES('$name', '$email', '$city')";

	if(mysqli_query($conn, $sql)) {
		echo "";
	}else{
		echo "query not passed = ".mysqli_error($conn);
	}
	showData($conn);
}
if (isset($_GET['delbutton'])) {
	$delid = $_GET['del'];
	$query = "DELETE FROM info WHERE ID = $delid";

	if(mysqli_query($conn, $query)) {
		showData($conn);
	}else{
		echo "query not passed = ".mysqli_error($conn);
	}
	
}

if (isset($_GET['updatebutton'])) {
	$currentid = $_GET['currentid'];
	$newname = $_GET['newname'];
	$newemail = $_GET['newemail'];
	$newcity = $_GET['newcity'];
	$newid = $_GET['newid'];

	$sqli = "UPDATE info SET ID='$newid',Name='$newname',Email='$newemail',City='$newcity' WHERE ID=$currentid";
	mysqli_query( $conn, $sqli);
	showData($conn);
}
if (isset($_GET['edit'])) {
	$id = $_GET['x'];
	$sql1 = "SELECT * FROM info WHERE ID = $id";
	$result = mysqli_query($conn, $sql1);
	/*echo '<center>
	<form method = "post">
	<table style = "border: solid 1px black;" border = 1 cellpadding = "5px" cellspacing = "0px" align = "center">
	<tr><th>Name</th><th>Email</th><th>City</th><th>action</th></tr>';*/
	while ( $row = mysqli_fetch_array( $result)) {
		$uid = $row['ID'];
	echo '<td><input type = "textfield" id = "newid" value = "'.$row['ID'].'"></td>
	<td><input type = "textfield" id = "newname" value = "'.$row['Name'].'"></td>
  <td><input type = "textfield" id = "newemail" value = "'.$row['Email'].'"></td>
	<td><input type = "textfield" id = "newcity" value = "'.$row['City'].'"></td>
	<td><input type = "submit" value = "update" id = "update" onclick = "updateFunction('.$uid.')"><input type = "button" value = "cancel" id = cancel onclick = cancelFunction()></td>
  ';
	}
	/*echo '</table>
  </form>
  </center>';*/
}

if (isset($_GET['cancel'])) {
	showData($conn);
}


?>