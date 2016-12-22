<?php 

namespace CarObject;

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
    . $this->fuel . ".<br>";
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
