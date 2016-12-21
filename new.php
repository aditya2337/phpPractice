<?php 

/*for ($i = 5; $i < 0; $i--) { 
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
*/
class Car {
  public $seats = 4;
  public $fuel = '50 L';
  public function __construct($seats, $fuel) {
    $this->seats = $seats;
    $this->fuel = $fuel;
  }

  public function getCarDetails()
  {
    echo "Seat capacity of this Car is = " . $this->seats . " and the fuel capacity of this car is = "
    . $this->fuel . ".";
  }

  public function setFuelCapacity($newFuel) {
    $this->fuel = $newFuel;
  }
}

$alto = new Car(4, '70 L');

$alto->getCarDetails();
$alto->setFuelCapacity('80 L');
$alto->getCarDetails();


 ?>
