<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");

// Check the connection
if ($con === false) {
    die("ERROR: Could not connect. " . $con->connect_error);
}

// Prepare an INSERT statement
$sql = "INSERT INTO packages (package_name, package_id, package_price, package_locations) VALUES ('$package_name', 'NULL', '$package_price', '$package_locations')";

if ($stmt = $con->prepare($sql)) {
    //Bind variables to the prepared statement as parameters
    $stmt->bind_param("sss", $package_name, $package_price, $package_locations);

    // Set parameters
    $package_name = $_REQUEST['package_name'];
    $package_price = $_REQUEST['package_price'];
    $package_locations = $_REQUEST['package_locations'];

    //Attempt to execute the prepared statement
    if ($stmt->execute()) {
        echo "Records inserted successfully";
    } else {
        echo "Error: Could not execute query: $sql. " . $con->error;
    }
} else {
    echo "Error: Could not prepare query: $sql. " . $con->error;
}

//Close statement
$stmt->close();

//Close connection
$con->close();

//// Escape user inputs for security
//$package_name = $con->real_escape_string($_POST['package_name']);
//$package_price = $con->real_escape_string($_POST['package_price']);
//$package_locations = $con->real_escape_string($_POST['package_locations']);
//
//// attempt insert query execution
//$sql = "INSERT INTO packages(package_name, package_id, package_price, package_locations) VALUES ('$package_name', 'NULL','$package_price','$package_locations')";
//if($con->query($sql) === true){
//    echo "Records inserted successfully.";
//} else{
//    echo "ERROR: Could not able to execute $sql. " . $con->error;
//}
//
//// Close connection
//$con->close();
//
///* Attempt MySQL server connection. Assuming you are running MySQL
//server with default setting (user 'root' with no password) */
//$mysqli = new mysqli("localhost", "root", "", "demo");
//
//// Check connection
//if($mysqli === false){
//    die("ERROR: Could not connect. " . $mysqli->connect_error);
//}
//
//// Prepare an insert statement
//$sql = "INSERT INTO persons (first_name, last_name, email) VALUES (?, ?)";
//
//if($stmt = $mysqli->prepare($sql)){
//    // Bind variables to the prepared statement as parameters
//    $stmt->bind_param("sss", $first_name, $last_name, $email);
//
//    // Set parameters
//    $first_name = $_REQUEST['first_name'];
//    $last_name = $_REQUEST['first_name'];
//    $email = $_REQUEST['email'];
//
//    // Attempt to execute the prepared statement
//    if($stmt->execute()){
//        echo "Records inserted successfully.";
//    } else{
//        echo "ERROR: Could not execute query: $sql. " . $mysqli->error;
//    }
//} else{
//    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
//}
//
//// Close statement
//$stmt->close();
//
//// Close connection
//$mysqli->close();
//
