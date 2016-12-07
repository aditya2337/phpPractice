<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <table border = "1" style="width: 100%" cellpadding="3" cellspacing="0">
 	<?php
 	echo "<tr>";
 	for ($i=1; $i <= 6; $i++) { 
	for ($j=1; $j <= 5; $j++) {
		$result = $i*$j;
 		echo "<td>$i*$j=".$result."&nbsp;</td>";
 		}
 		echo "</tr>";
	}
 	?>
 </table>
</body>
</html>