<<?php 

for ($i = 5; $i < 0; $i--) { 
  for ($j = 5; $j < 0 ; $j--) { 
  	if ( $i == $j) {
  	  echo "*";
  	} else {
  		echo "0";
  	}
  }
  echo "<br>";
}
echo "stri";
echo "tag 2";

class Car() {
  $seats = 4;
  $fuel = '50 L';
  public __construct($seats, $fuel) {
    $this->$seats = $seats;
    $this->fuel = $fuel;
  }
}

$alto = new Car(4, '70 L');

 ?>
