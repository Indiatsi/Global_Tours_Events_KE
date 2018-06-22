<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17/06/2018
 * Time: 10:32
 */

session_start();


$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");

if (isset($_POST))
{
    $package_name = $con->real_escape_string($_POST['package_name']);
    $package_details = $con->real_escape_string($_POST['package_locations']);
    $package_price = $con->real_escape_string($_POST['package_price']);
}

//$package_name = $con->real_escape_string($_POST['package_name']);
//$package_details = $con->real_escape_string($_POST['package_locations']);
//$package_price = $con->real_escape_string($_POST['package_price']);

$query = "INSERT INTO `packages` (`package_name`, `package_id`, `package_price`, `package_locations`) VALUES ('$package_name', NULL, '$package_price', '$package_details');";

$result = $con->query($query) OR die($con->error);

if($result){
    echo "Successful update";
}else{
    echo "Error in update";
}