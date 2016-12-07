<div class="message"></div>
<form method = "post" action = "input.php" >
	Name :<input type = "textfield" name = "fname"><br>
	E-mail : <input type = "textfield" name = "email"><br>
	City : <input type = "textfield" name = "city"><br>
	<input type = "submit" value = "ADD" name = "submit" class = "ajaxsave">
</form>
<div>
	<?php

	if (isset($_GET['uid'])) {
	$link = mysqli_connect( "localhost", "root", "aditya337", "assignment");
  if($link === false){
  	die( "ERROR: Could not connect. " . mysqli_connect_error());
  }
	$edit = $_GET['uid'];
	$sql1 = "SELECT * FROM info WHERE ID = $edit";
	$result = mysqli_query($link, $sql1);
	echo '<center>
	<form method = "post">
	<table style = "border: solid 1px black;" border = 1 cellpadding = "5px" cellspacing = "0px" align = "center">
	<tr><th>Name</th><th>Email</th><th>City</th><th>action</th></tr>';
	while ( $row = mysqli_fetch_array( $result)) {
	echo '<tr><td><input type = "textfield" name = "newname" value = "'.$row['Name'].'"></td>
  <td><input type = "textfield" name = "newemail" value = "'.$row['Email'].'"></td>
	<td><input type = "textfield" name = "newcity" value = "'.$row['City'].'"></td>
	<td><input type = "submit" value = "update" name = "update"><a href = input.php ><input type = "button" value = "cancel"></a></td>
  </tr>';
	}
	echo '</table>
  </form>
  </center>';
  if (isset($_POST['update'])) {
  	$newname = $_POST['newname'];
	  $newemail = $_POST['newemail'];
	  $newcity = $_POST['newcity'];

	  $sqli = "UPDATE info SET Name='$newname',Email='$newemail',City='$newcity' WHERE ID=$edit";
	  mysqli_query( $link, $sqli);
	  header('location: input.php');
	  }   
	}

  ?>
</div>
<?php

$conn = mysqli_connect( "localhost", "root", "aditya337", "assignment");
if($conn === false){
	die( "ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
	$name = $_POST['fname'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	

	$qry = "INSERT INTO info( Name, Email, City) VALUES('$name', '$email', '$city')";

	if(mysqli_query($conn, $qry)) {
	  echo "";
	}else
	echo "query not passed = ".mysqli_error($conn);
}

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
			echo "<td><a href = input.php?uid='".$uid."'><input type = 'button' value = 'edit'></a><a href = manipulate.php?id='".$uid."'><input type = 'button' value = 'delete' data = '".$uid."' class = 'delete'></a></td>";
		echo "</tr>";
	}
echo "</table>";



?>
