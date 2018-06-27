<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");

// Escape user inputs for security
$package_name = $con->real_escape_string($_POST['package_name']);
$package_price = $con->real_escape_string($_POST['package_price']);
$package_locations = $con->real_escape_string($_POST['package_locations']);

// attempt insert query execution
$sql = "INSERT INTO packages(package_name, package_id, package_price, package_locations) VALUES ('$package_name', 'NULL','$package_price','$package_locations')";
if($con->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $con->error;
}

// Close connection
$con->close();
?>