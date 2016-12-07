<?php 

for ($i = 1; $i <=11; $i++) {
  if ($i<=6 ) { 
  for ($j = 6; $j >= $i; $j--) { 
  	echo "*";
  }
}
else {
	for ($k=6; $k <=$i ; $k++) { 
		echo "*";
	}
}
echo "<br/>";
}
echo "---------------reverse string function-------------------";
function reverse_string($str1)  
{  
 $n = strlen($str1);  
 if($n == 1)  
   {  
    return $str1;  
   }  
 else  
   {  
   $n--;  
   return reverse_string(substr($str1,1, $n)) . substr($str1, 0, 1);  
   }  
}  
print_r(reverse_string('12347870'));  
?>		