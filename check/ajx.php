
<!DOCTYPE html>
<html>
<head>
	<title>form</title>

</head>
<body>
<script>
 var http;
 var http = new XMLHttpRequest();
 function add() {
 	http.onreadystatechange = function() {
 		if(http.readyState == 4) {
 		document.getElementById("block").innerHTML = http.responseText;
 		}
 	}
 	var btn = document.getElementById("btn");
 	var new_name = document.getElementById("name").value;
 	var new_email = document.getElementById("email").value;
 	var new_city = document.getElementById("city").value;
 	var all = "?name=" +new_name;
 	all += "&email="+new_email+"&city="+new_city+"&submit="+btn;
 	http.open("GET","code.php"+all,true);
 	http.send(null);
 }
</script>
<form action = "" method="post">
  
  Name <input type="text" name = "name" id = "name"><br><br>
  Email <input type="text" name = "email" id = "email"><br><br>
  City <input type="text" name = "city" id = "city"><br><br>
  <input type = "button" value="add" onclick ="add()"id="btn"name="submit">
  <div id = block>
  gh
  </div>
</form>
</body>
</html>
