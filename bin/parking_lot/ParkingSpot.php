<?php

class ParkingSpot
{ 
    protected $size;
    protected $availableSpot;
    
    function __construct() {
        $this->size = 0;
        $this->availableSpot = [];
    }
    
    public function create($input) {
        $this->size = $input;
        for($i = 1; $i <= $input; $i++) {
            $this->availableSpot[$i] = true;
        }
        return "Created a parking lot with $input slots\n";
    }
    
    public function park($vehicleNo, $color) {
        $lastSlot = false;
        foreach($this->availableSpot as $key => $value) {
            if($value === true) {
                $this->availableSpot[$key] = [$vehicleNo, $color];
                $this->size--;
                $lastSlot = true;
                return "Allocated slot number: $key\n";
                break;
            }
        }
        if($this->size == 0 && $lastSlot === false) {
            return "Sorry, parking lot is full\n";
        }
    } 
    
    public function removeVehicle($no) 
    { 
        $this->availableSpot[$no] = true;
        $this->size++;
        return "Slot number $no is free\n";
    } 
    
    public function status() 
    { 
        $data = "Slot No.    Registration No     Colour\n";
        foreach($this->availableSpot as $key => $value) {
            if($value !== true) {
                $slot = $key;
                for($i=0;$i<=10-(strlen($key)-1);$i++) $slot .= ' ';
                $data .= "$slot$value[0]       $value[1]\n";
            }
        }
        return $data;
    } 
    public function findRegistration($colour) 
    { 
        $result = [];
        foreach($this->availableSpot as $key => $value) {
            if($value !== true) {
                if($colour == $value[1]) {
                    $result[] = $value[0];
                }
            }
        }
        if(empty($result)) return "Not found\n";
        else return implode(", ", $result)."\n";
    } 
  
    public function findSlotNumberByColour($colour) { 
        $result = [];
        foreach($this->availableSpot as $key => $value) {
            if($value !== true) {
                if($colour == $value[1]) {
                    $result[] = $key;
                }
            }
        }
        if(empty($result)) return "Not found\n";
        else return implode(", ", $result)."\n";
    } 
    
    public function findSlotNumberByRegistration($registration) { 
        $result = [];
        foreach($this->availableSpot as $key => $value) {
            if($value !== true) {
                if($registration == $value[0]) {
                    $result[] = $key;
                }
            }
        }
        if(empty($result)) return "Not found\n";
        else return implode(", ", $result)."\n";
    } 
    
} 


if(isset($argv[1])) {
    if(file_exists("../$argv[1]")) {
        // To run parking lot simulation from a file
        $parkingSpotClass = new ParkingSpot();
        if ($fh = fopen('../file_inputs.txt', 'r')) {
            session_start();
            while (!feof($fh)) {
                $line = fgets($fh);
                $process = explode(' ', $line);
                $command = trim(preg_replace('/\s\s+/', ' ', $process[0]));
                switch ($command) {
                    case 'create_parking_lot':
                        echo $parkingSpotClass->create(trim($process[1]));
                        break;
                    case 'park':
                        echo $parkingSpotClass->park(trim($process[1]), trim($process[2]));
                        break;
                    case 'leave':
                        echo $parkingSpotClass->removeVehicle(trim($process[1]));
                        break;
                    case 'status':
                        echo $parkingSpotClass->status();
                        break;
                    case 'registration_numbers_for_cars_with_colour':
                        echo $parkingSpotClass->findRegistration($process[1]);
                        break;
                    case 'slot_numbers_for_cars_with_colour':
                        echo $parkingSpotClass->findSlotNumberByColour($process[1]);
                        break;
                    case 'slot_number_for_registration_number':
                        echo $parkingSpotClass->findSlotNumberByRegistration($process[1]);
                        break;
                    default:
                        // echo "Not a valid command";
                        break;
                }
            }
            fclose($fh);
        }
    } 
} else {
    // To run parking lot simulation via interactive command line
    $parkingSpotClass = new ParkingSpot();
    echo "Please input command:\n";
    while($stdin = fopen('php://stdin', 'r')) {
        $line = trim(fgets(STDIN)); 
        $process = explode(' ', $line);
        $command = trim(preg_replace('/\s\s+/', ' ', $process[0]));
        if($command == 'create_parking_lot') {
            echo $parkingSpotClass->create(trim($process[1]));
        } elseif($command == 'park') {
            echo $parkingSpotClass->park(trim($process[1]), trim($process[2]));
        } elseif($command == 'leave') {
            echo $parkingSpotClass->removeVehicle(trim($process[1]));
        } elseif($command == 'status') {
            echo $parkingSpotClass->status();
        } elseif($command == 'registration_numbers_for_cars_with_colour') {
            echo $parkingSpotClass->findRegistration($process[1]);
        } elseif($command == 'slot_numbers_for_cars_with_colour') {
            echo $parkingSpotClass->findSlotNumberByColour($process[1]);
        } elseif($command == 'slot_number_for_registration_number') {
            echo $parkingSpotClass->findSlotNumberByRegistration($process[1]);
        } elseif($command == 'exit') {
            exit;
        }
    }
    
    
}


