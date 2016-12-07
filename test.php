<?php

echo "------------Fibonacci series------------<br>";
 $a = 0;
 $b = 1;
for ($i=0; $i <=20 ; $i++) {
	if ($i <= 1) {
		$c = $i;
	}else
	 $a = $b;
	 $b = $c;
	 $c = $a + $b;
	echo $c."&nbsp";
}echo "<br>";
 // 16

echo "------------Factorial-------------------<br>";


$factorial = 1;
for ($i=4; $i >=1 ; $i--) { 
	$factorial= $factorial*$i;
}
echo $factorial."<br>";

// 20

echo "------------Star Pattern-------------------<br>";

for ($i=1; $i <= 5; $i++) { 
	for ($j=1; $j <= 9; $j++) { 
		if ( $i == $j | $i == 10-$j) {
			echo "*";
		} else echo "0&nbsp";
	}echo "<br>";
}


// 25

echo "------------variables-------------------<br>";

$one = "A";
$two = "f";
$three = "";
$four = "d";
/*$message = "";

$hello = array();
$hello['one'] = $one;
$hello['two'] = $two;
$hello['three'] = $three;
$hello['four'] = $four;

foreach ($hello as $value){
	if (empty($value)){
		$message .= $value;
	}	else
	$message .= $value.",";
}
$message = rtrim($message,',');
echo $message;*/


$output = "";
$output = implode(',', array_filter(array($one, $two, $three, $four)));
if ($four == "") {
	echo $output;
}
elseif ($three == "") {
	echo $output;
}
elseif ($two == "") {
	echo $output;
}
elseif ($one == "") {
	echo $output;
}


/*else echo $one.",".$two.",".$three.",".$four;*/

// 20




?>