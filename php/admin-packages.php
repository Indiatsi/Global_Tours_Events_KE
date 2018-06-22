
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/06/2018
 * Time: 13:52
 */

// Always start this first
session_start();

$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");

if (!(array_key_exists("package_id",$_SESSION) AND isset($_SESSION['package_id']))) {
    header("refresh: 0.5; url=../admin-packages.html");
}

$query = "SELECT `package_name`,`package_price`, `package_locations` FROM `packages`;";
    $result = $con->query($query) OR die($con->error);
    $all_property = array();
    //showing property
    echo '<tr class="data-heading">';  //initialize table tag
    while ($property = mysqli_fetch_field($result)) {
        echo '<td>' . $property->name . '</td>';  //get field name for header
        array_push($all_property, $property->name);  //save those to array
    }
    echo '</tr>'; //end tr tag
    //showing all data
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        foreach ($all_property as $item) {
            echo '<td>' . $row[$item] . '</td>'; //get items using property value
        }
        echo '</tr>';
}

?>