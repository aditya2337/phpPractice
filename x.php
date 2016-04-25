<?php 

for ($i=1; $i <=11; $i++) { 
  for ($j=1; $j <=11 ; $j++) { 
  	if ($i == $j || $i == 12-$j) {
  		echo "*";
  	}
  	else {
  		echo "&nbsp";
  	}
  }
  echo "<br>";
}

?>