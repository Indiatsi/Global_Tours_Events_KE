<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Global Tours and Events KE</title>
    <link href="css/admin-header.css" rel="stylesheet" type="text/css">
    <link href="css/admin-package.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: #343838">

<?php
$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");
?>
<br>
<br>
<section id="side-bar">
    <div>
        <?php
        $sql = "SELECT * FROM packages";
        if ($result = $con->query($sql)) {
            if ($result->num_rows > 0) {

                echo " <table id='package-listings'>";
                echo "<h2>PACKAGE LISTINGS</h2>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Package Name</th>";
                echo "<th>Package Price</th>";
                echo "<th>Package Locations</th>";
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $result->fetch_array()) {
                    echo "<tr>";
                    echo "<td>" . $row['package_name'] . "</td>";
                    echo "<td>" . $row['package_price'] . "</td>";
                    echo "<td>" . $row['package_locations'] . "</td>";
                    echo "<td><a href='admin-edit.php'><img src='img/update.png'></a></td>";
                    echo "<td><a href='admin-delete.php'><img src='img/remove.png'></a></td>";
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
            <a href="admin-home.html" class="item"><img src="img/home.png">Dashboard</a>
            <br>
            <a href="admin-packages.php" class="item"><img src="img/view.png">All Packages</a>
            <br>
            <a href="admin-booked.php" class="item"><img src="img/booked.png">Booked Packages</a>
            <br>
            <a href="admin-addpackage.html" class="item"><img src="img/add.png">Add Packages</a>
            <br>
            <a href="#" class="item"><img src="img/logout.png">Log Out</a>
            <br>
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