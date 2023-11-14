<?php
require('vendor/autoload.php');
require_once('config\config.php');
require_once('config\db.php');

$actions = array('IN', 'OUT', 'COMPLETE');
$remarks = array('Signed', 'For approval','');

$faker = Faker\Factory::create();
for ($start = 1; $start <= 200; $start++) {

    $datelog = mysqli_real_escape_string($conn, date("Y-m-d H:i:s"));
    $documentcode = mysqli_real_escape_string($conn, $faker->numberBetween($min = 100, $max = 105));
    $action = mysqli_real_escape_string($conn, $actions[rand(0, 2)]);
    $office = mysqli_real_escape_string($conn, $faker->company);
    $employee = mysqli_real_escape_string($conn, $faker->name);
    $remark = mysqli_real_escape_string($conn, $remarks[rand(0, 2)]);


    $stmt = "INSERT INTO `transactions`(`date_log`, `document_code`, `action`, `office`, `employee`, `remarks`) VALUES ('$datelog','$documentcode','$action','$office','$employee','$remark')";
    if(mysqli_query($conn, $stmt)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $stmt. " . mysqli_error($conn);
    }
}
