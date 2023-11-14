<?php
require('vendor/autoload.php');
require_once('config\config.php');
require_once('config\db.php');


$faker = Faker\Factory::create();
for ($start = 1; $start <= 200; $start++) {

    $name =  mysqli_real_escape_string($conn, $faker->company);
    $contactnumber = mysqli_real_escape_string($conn, $faker->phoneNumber);
    $email = mysqli_real_escape_string($conn, $faker->companyEmail);
    $address = mysqli_real_escape_string($conn, $faker->streetAddress);
    $city =  mysqli_real_escape_string($conn, $faker->city);
    $country = mysqli_real_escape_string($conn, $faker->country);
    $postal = mysqli_real_escape_string($conn, $faker->postcode);

    $stmt = "INSERT INTO `offices`(`name`, `contact_no`, `email`, `address`, `city`, `country`, `postal`) VALUES ('$name','$contactnumber','$email','$address','$city','$country','$postal')";
    if(mysqli_query($conn, $stmt)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $stmt. " . mysqli_error($conn);
    }


}
