<?php

if (isset($_GET['uid'])) {
	$edit = $_GET['uid'];
	echo '<center>
	<form method = "post">
	<table id="demoajax"  style = "border: solid 1px black;" border = 1 cellpadding = "5px" cellspacing = "0px" align = "center">
	<tr><th>Name</th><th>Email</th><th>City</th><th>action</th></tr> 
	<tr><td><input type = "textfield" name = "newname"></td>
  <td><input type = "textfield" name = "newemail"></td>
	<td><input type = "textfield" name = "newcity"></td>
	<td><input type = "submit" value = "update" name = "update"><input type = "button" value = "cancel"></td>
  </tr>
  </table>
  </form>
  </center>';
  $link = mysqli_connect( "localhost", "root", "aditya337", "assignment");
  if($link === false){
  	die( "ERROR: Could not connect. " . mysqli_connect_error());
  }
  if (isset($_POST['update'])) {
  	$newname = $_POST['newname'];
	  $newemail = $_POST['newemail'];
	  $newcity = $_POST['newcity'];

	  $sqli = "UPDATE info SET Name='$newname',Email='$newemail',City='$newcity' WHERE ID=$edit";
	  mysqli_query( $link, $sqli);
	  //header('location: manipulate.php');
  }  
}
?>