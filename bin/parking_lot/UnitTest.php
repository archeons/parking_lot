<?php

include 'ParkingSpot.php';

class Test extends ParkingSpot {
    protected $parkingSpotClass;
    
    function __construct() {
        $this->parkingSpotClass = new ParkingSpot();
    }
    
    public function testCreate() 
    { 
        echo "Test to create 10 slots\n";
        echo $this->parkingSpotClass->create(10);
    } 
    
    public function testPark() 
    { 
        echo "Test park with no slot\n";
        echo $this->parkingSpotClass->park("KA-01-HH-1234", "White");
        echo "Test park with 1 slot and 2 cars\n";
        $this->parkingSpotClass->create(1);
        echo $this->parkingSpotClass->park("KA-01-HH-1234", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1235", "White");
    }     
    
    public function testLeave() {
        echo "Test leave park with 1 slot and 1 car\n";
        echo $this->parkingSpotClass->create(1);
        echo $this->parkingSpotClass->park("KA-01-HH-1234", "White");
        echo $this->parkingSpotClass->removeVehicle(1);
    } 
    
    public function testStatus() {
        echo "Test status park with 10 slots and 10 cars\n";
        echo $this->parkingSpotClass->create(10);
        echo $this->parkingSpotClass->park("KA-01-HH-1234", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1235", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1236", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1237", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1238", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1239", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1210", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1211", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1212", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1213", "White");
        echo $this->parkingSpotClass->status();
    } 
    
    public function testFindRegistration() {
        echo "Test status park with 10 slots and 10 cars to find Registration of White Car(s)\n";
        echo $this->parkingSpotClass->create(10);
        echo $this->parkingSpotClass->park("KA-01-HH-1234", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1235", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1236", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1237", "Blue");
        echo $this->parkingSpotClass->park("KA-01-HH-1238", "Red");
        echo $this->parkingSpotClass->park("KA-01-HH-1239", "Blue");
        echo $this->parkingSpotClass->park("KA-01-HH-1210", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1211", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1212", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1213", "Blue");
        echo "Result:\n";
        echo $this->parkingSpotClass->findRegistration('White');
    } 
    
    public function testFindSlotNumberByColour() {
        echo "Test status park with 10 slots and 10 cars to find Slot No of White Cars\n";
        echo $this->parkingSpotClass->create(10);
        echo $this->parkingSpotClass->park("KA-01-HH-1234", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1235", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1236", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1237", "Blue");
        echo $this->parkingSpotClass->park("KA-01-HH-1238", "Red");
        echo $this->parkingSpotClass->park("KA-01-HH-1239", "Blue");
        echo $this->parkingSpotClass->park("KA-01-HH-1210", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1211", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1212", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1213", "Blue");
        echo "Result:\n";
        echo $this->parkingSpotClass->findSlotNumberByColour('White');
    } 
    
    public function testFindSlotNumberByRegistration() {
        echo "Test status park with 10 slots and 10 cars to find Slot No of White Cars\n";
        echo $this->parkingSpotClass->create(10);
        echo $this->parkingSpotClass->park("KA-01-HH-1234", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1235", "White");
        echo $this->parkingSpotClass->park("KA-01-HH-1236", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1237", "Blue");
        echo $this->parkingSpotClass->park("KA-01-HH-1238", "Red");
        echo $this->parkingSpotClass->park("KA-01-HH-1239", "Blue");
        echo $this->parkingSpotClass->park("KA-01-HH-1210", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1211", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1212", "Black");
        echo $this->parkingSpotClass->park("KA-01-HH-1213", "Blue");
        echo "Result:\n";
        echo $this->parkingSpotClass->findSlotNumberByRegistration('KA-01-HH-1239');
    } 
}


$testClass = new Test();
if(isset($argv[1])) {
    switch ($argv[1]) {
        case 'create':
            $testClass->testCreate();
            break;
        case 'park':
            $testClass->testPark();
            break;
        case 'leave':
            $testClass->testLeave();
            break;
        case 'status':
            $testClass->testStatus();
            break;
        case 'registration_numbers_for_cars_with_colour':
            $testClass->testFindRegistration();
            break;
        case 'slot_numbers_for_cars_with_colour':
            $testClass->testFindSlotNumberByColour();
            break;
        case 'slot_number_for_registration_number':
            $testClass->testFindSlotNumberByRegistration();
            break;
        default:
            // echo "Not a valid command";
            break;
    }
}

?>