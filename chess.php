<!DOCTYPE html>
<html>
<head>
	<title>chess</title>
</head>
<body>
<table width="270px" border="1" cellspacing="0">
	<?php
	echo "<tr>";
	for ($i=1; $i <=9 ; $i++) { 
		for ($j=1; $j <=9 ; $j++) {
		if($i % 2 != 0) { 
			if($j % 2 ==0){
			echo "<td height ='30px' width = '30px' bgcolor = 'black' ></td>";
			} else
			echo "<td height ='30px' width = '30px' bgcolor = 'white' ></td>";
		} elseif ($i % 2 == 0) {
			if ($j % 2 != 0) {
			echo "<td height ='30px' width = '30px' bgcolor = 'black' ></td>";
			} else
			echo "<td height ='30px' width = '30px' bgcolor = 'white' ></td>";
			}
		}
		echo "</tr>";
		}		
	?>
</table>
</body>
</html>