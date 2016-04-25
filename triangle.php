<?php

for ( $i = 1; $i <= 4; $i++) { 
  for ($j=1; $j <=4-$i; $j++) {
  /*if ($i == ) {*/
    echo "&nbsp";
  /*}*/  
}
for ($k=1; $k <= ($i*2)-1; $k++) { 
	echo "*";
}
echo "<br>";
}

?>