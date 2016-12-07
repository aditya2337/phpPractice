<?php
for ($i=1; $i <= 2; $i++) { 
	for ($j=1; $j <= $i; $j++) { 
			echo "*";
		}
	echo "<br>";
}
for ($i=2; $i >= 1 ; $i--) { 
	for ($j=1; $j <=$i ; $j++) { 
			echo "*";
		} 	
	echo "<br>";
}
function Prime($p)
{
	for ($i=2; $i < $p ; $i++) { 
		# code...
	}
	if ($p%1 == 0 && $p% $p == 0) {
		echo "the number is prime";
	}else echo "the number is not a prime";
}
print_r(Prime(4));
?>