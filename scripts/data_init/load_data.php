<?php
include_once("../../db.php");
require ('vendor/autoload.php');

$faker = Faker\Factory::create('en_PH');

$database = new Database();
$connection = $database->getConnection();

$data = array();

// generate 15 records
for($i=1; $i<=15; $i++){
    array_push($data, $faker->unique()->province);
}
print_r($data);

$sql = "INSERT INTO province(name) VALUES (:name)";
$stmt = $connection->prepare($sql);


foreach ($data as $row) {
    $stmt->bindParam(':name', $row);
    $stmt->execute();
}


// Function to generate a random date within a range (e.g., for datelog)
function randomDate($start, $end) {
    $timestamp = mt_rand(strtotime($start), strtotime($end));
    return date('Y-m-d H:i:s', $timestamp);
}

// Generate and insert data for the Employee table
for ($i = 1; $i <= 200; $i++) {
    $lastname = $faker->lastName;
    $firstname = $faker->firstName;
    $office_id = $faker->numberBetween(1, 50); // Random office_id
    $address = $faker->address;

    // Insert data into the Employee table
    $sql = "INSERT INTO Employee (lastname, firstname, office_id, address) VALUES (:lastname, :firstname, :office_id, :address)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':office_id', $office_id);
    $stmt->bindParam(':address', $address);
    $stmt->execute();
}

// Generate and insert data for the Office table
for ($i = 1; $i <= 50; $i++) {
    $name = $faker->company;
    $contactnum = $faker->phoneNumber;
    $email = $faker->email;
    $address = $faker->address;
    $city = $faker->city;
    $country = $faker->country;
    $postal = $faker->postcode;

    // Insert data into the Office table
    $sql = "INSERT INTO Office (name, contactnum, email, address, city, country, postal) VALUES (:name, :contactnum, :email, :address, :city, :country, :postal)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':contactnum', $contactnum);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':postal', $postal);
    $stmt->execute();
}

// Generate and insert data for the Transaction table
for ($i = 1; $i <= 500; $i++) {
    $employee_id = $faker->numberBetween(1, 200); // Random employee_id
    $office_id = $faker->numberBetween(1, 50); // Random office_id
    $datelog = randomDate('2023-01-01', '2023-12-31'); // Random date in 2023
    $action = $faker->word;
    $remarks = $faker->sentence;
    $documentcode = $faker->unique()->numerify('DOC#####'); // Unique document code

    // Insert data into the Transaction table
    $sql = "INSERT INTO Transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (:employee_id, :office_id, :datelog, :action, :remarks, :documentcode)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->bindParam(':office_id', $office_id);
    $stmt->bindParam(':datelog', $datelog);
    $stmt->bindParam(':action', $action);
    $stmt->bindParam(':remarks', $remarks);
    $stmt->bindParam(':documentcode', $documentcode);
    $stmt->execute();
}
echo "hello"
?>
