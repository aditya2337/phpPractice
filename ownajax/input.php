<html>
<body>

	<script type="text/javascript">
		var yes;
		var ajaxRequest;
		ajaxRequest = new XMLHttpRequest();
		function addFunction(){

			ajaxRequest.onreadystatechange = function(){
				if(ajaxRequest.readyState == 4){
					var ajaxDisplay = document.getElementById('ajaxDiv');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
			}

			var name = document.getElementById('fname').value;
			var email = document.getElementById('email').value;
			var city = document.getElementById('city').value;
			var button = document.getElementById('add').value;

			var exString = "?name=" + name;
			exString += "&email=" + email + "&city=" + city + "&button=" + button;
			ajaxRequest.open("GET", "form.php" + exString, true);
			ajaxRequest.send(null);
		}
		function deleteFunction(uid){
			ajaxRequest.onreadystatechange = function(){
				if(ajaxRequest.readyState == 4){
					var ajaxDisplay = document.getElementById('ajaxDiv');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
			}

			//var delid = this.document.getElementById('delete').getAttribute('data');
			var delid = this.document.getElementById('delete').parentElement.parentElement.id;
			var delbutton = document.getElementById('delete');

			var exString = "?del=" + uid;
			exString += "&delbutton=" + delbutton;
			ajaxRequest.open("GET", "form.php" + exString, true);
			ajaxRequest.send(null);
		}

		function cancelFunction() {
			ajaxRequest.onreadystatechange = function(){
				if ( ajaxRequest.readyState == 4) {
					var ajaxDisplay = document.getElementById('ajaxDiv');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
			}
			var cancel = document.getElementById('cancel');
			var exString = "?cancel=" + cancel;
			ajaxRequest.open("GET", "form.php" + exString, true);
			ajaxRequest.send(null);
		}

		function editFunction(uid) {
			ajaxRequest.onreadystatechange = function(){
				if(ajaxRequest.readyState == 4){
					var ajaxDisplay = document.getElementById(uid);
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
			}
			var edit = document.getElementById('edit');
			var x  = document.getElementById('edit').parentElement.id;
			// document.getElementById('ajaxDiv').innerHTML = uid;
			var exString = "?x=" + uid;
			exString += "&edit=" + edit;
			//document.getElementById('ajaxDiv').innerHTML = x;
			//document.getElementById('hena').parentElement.parentElement.getAttribute(uid).innerHTML = yes;
			//document.getElementById(x).innerHTML = yes;
      ajaxRequest.open("GET", "form.php"+exString, true);
     ajaxRequest.send(null);
   }

   function updateFunction(uid){
   	ajaxRequest.onreadystatechange = function(){
				if ( ajaxRequest.readyState == 4) {
					var ajaxDisplay = document.getElementById('ajaxDiv');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
		  }
		  var newid = document.getElementById('newid').value;
		  var newname = document.getElementById('newname').value;
			var newemail = document.getElementById('newemail').value;
			var newcity = document.getElementById('newcity').value;
			var updatebtn = document.getElementById('update').value;

			var exString = "?newname=" + newname;
			exString += "&newemail=" + newemail + "&newcity=" + newcity + "&updatebutton=" + updatebtn + "&newid=" + newid + "&currentid=" + uid;
			ajaxRequest.open("GET", "form.php" + exString, true);
			ajaxRequest.send(null);
    }

  </script>

 <div class="message"></div>
 <center>
 	<form method = "post">
 		Name :<input type = "textfield" id = "fname"><br>
 		E-mail : <input type = "textfield" id = "email"><br>
 		City : <input type = "textfield" id = "city"><br>
 		<input type = "button" value = "ADD" onclick = "addFunction()" id = "add">
 	</form>
 	<div id = "ajaxDiv">
 		<?php 
 		$conn = mysqli_connect( "localhost", "root", "aditya337", "assignment");
 		if($conn === false){
 			die( "ERROR: Could not connect. " . mysqli_connect_error());
 		}
 		$sql = "SELECT * FROM info";
 		$data = mysqli_query($conn, $sql);
 		$str = "<table id='demoajax'  style = 'border: solid 1px black;' border = 1 cellpadding = '5px' cellspacing = '0px' align = 'center'>";
 		$str .= "<tr> <th> Id </th> <th> Name </th> <th> Email </th> <th> City </th> <th> Action </th> </tr>";
 		if (mysqli_num_rows($data) > 0) {
 			while ( $row = mysqli_fetch_array( $data)) {
 				$uid = $row['ID'];
 				$str .=  "<tr id = '$uid'>
 				<td>" . $row['ID'] . "</td>
 				<td>" . $row['Name'] . "</td>
 				<td>" . $row['Email'] . "</td>
 				<td>" . $row['City'] . "</td>
 				<td id = 'edit'><input type = 'button' value = 'edit' onclick = 'editFunction(".$uid.")'id = 'edit'> <input type = 'button' data = $uid value = 'delete' onclick = 'deleteFunction(".$uid.")' id = 'delete'></td>
 			</tr>";
 		}
 	} else {
 		echo $str .= "<td> No records were found</td>";
 	}
 	$str .= "</table>";
 	echo $str;
 	?>
 </div>
</center>
</body>
</html>