<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01/07/2018
 * Time: 06:55
 */

//including the database connection file
$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");

//getting id of the data from url
$id = $_GET['package_id'];

//deleting the row from table
$result = mysqli_query($con, "DELETE FROM `packages` WHERE `packages`.`package_id` = $id");

//redirecting to the display page (index.php in our case)
header("url=.../admin-packages.php");