# Parking Lot Application

This application fully controlled by command. Run PHP parking_lot in bin directory with 2 options:
$ bin/parking_lot
1. The inputs from the file specified (ensure the file located in bin folder)
php ParkingSpot.php file_name
2. Start interactive command line
php ParkingSpot.php


Command list
- create_parking_lot [parking lot capacity]

- park [car's registration number and color] If success, program will print Allocated slot number: [nearest_slot_number]. If failed, (parking lot is full, slot already filled) will print Sorry, parking lot is full.

- leave [slot_number] The slot is available again after the car leaves the parking lot.

- status Print Slot No. Registration No Colour

- registration_numbers_for_cars_with_colour [car_color] Print all car's registration with specific color.

- slot_numbers_for_cars_with_colour [car_color] Print all slot number with specific car's color.

- slot_number_for_registration_number [car_registration_number] Print slot number with specific car's registration number.


To run Unit Test
php UnitTest.php [function]

Function list
- create_parking_lot

- park 

- leave 

- status 

- registration_numbers_for_cars_with_colour 

- slot_numbers_for_cars_with_colour [car_color]

- slot_number_for_registration_number 



