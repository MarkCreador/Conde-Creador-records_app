<?php
require('vendor/autoload.php');
require_once('config\config.php');
require_once('config\db.php');

$faker = Faker\Factory::create();
for ($start = 1; $start <= 200; $start++) {
    $lastname = mysqli_real_escape_string($conn, $faker->ID);
    $lastname = mysqli_real_escape_string($conn, $faker->lastName);
    $firstname = mysqli_real_escape_string($conn, $faker->firstName);
    $address = mysqli_real_escape_string($conn, $faker->streetAddress);
    $office = mysqli_real_escape_string($conn, $faker->company);


    $sqlstatement = "INSERT INTO `employees`('ID'`last_name`, `first_name`, `address`, `office`) VALUES ('$lastname','$firstname','$address','$office')";
    if (mysqli_query($conn, $sqlstatement)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sqlstatement. " . mysqli_error($conn);
    }


}
