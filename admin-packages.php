<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Global Tours and Events KE</title>
    <link href="css/admin-header.css" rel="stylesheet" type="text/css">
    <link href="css/admin-package.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");
?>

<header>
    <div id="search-container">
        <form>
            <input type="text" placeholder="Search...">
            <input type="submit" value="Submit">
        </form>
    </div>
</header>
<br>
<br>
<section id="side-bar">
    <div>
        <?php
        if ($result = $con->query("SELECT * FROM packages")) {


            if ($result->num_rows > 0) {

                echo " <table id='package-listings'>";
                echo "<h2>PACKAGE LISTINGS</h2>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Package Number</th>";
                echo "<th>Package Name</th>";
                echo "<th>Package Price</th>";
                echo "<th>Package Locations</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $result->fetch_array()) {
                    echo "<tr>";
                    echo "<td>" . $row['package_id'] . "</td>";
                    echo "<td>" . $row['package_name'] . "</td>";
                    echo "<td>" . $row['package_price'] . "</td>";
                    echo "<td>" . $row['package_locations'] . "</td>";
                    echo "</tr>";
                }
            }
            echo "</tbody>";
            echo "</table>";
        }

        ?>



    </div>

    <div id="btn">
        <div id='top'></div>
        <div id='middle'></div>
        <div id='bottom'></div>
    </div>
    <div id="box">
        <div id="items">
            <a href="admin-home.html" class="item">Dashboard</a>
            <a href="admin-packages.php" class="item">All Available Packages</a>
            <a href="admin-booked.php" class="item">Booked Packages</a>
            <a href="admin-addpackage.html" class="item">Add Packages</a>
            <a href="#" class="item">Log Out</a>
        </div>
    </div>
</section>

<script type="text/javascript">
    var sidebarBox = document.querySelector('#box'),
        sidebarBtn = document.querySelector('#btn'),
        pageWrapper = document.querySelector('#page-wrapper');

    sidebarBtn.addEventListener('click', function (event) {
        sidebarBtn.classList.toggle('active');
        sidebarBox.classList.toggle('active');
    });

    pageWrapper.addEventListener('click', function (event) {

        if (sidebarBox.classList.contains('active')) {
            sidebarBtn.classList.remove('active');
            sidebarBox.classList.remove('active');
        }
    });

    window.addEventListener('keydown', function (event) {

        if (sidebarBox.classList.contains('active') && event.keyCode === 27) {
            sidebarBtn.classList.remove('active');
            sidebarBox.classList.remove('active');
        }
    });
</script>
</body>
</html>