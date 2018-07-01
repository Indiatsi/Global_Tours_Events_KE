<?php
// including the database connection file
$con = new mysqli("localhost", "root", "", "global_tours_and_events_ke");

if(isset($_POST['update']))
{
    $package_name = $_POST['package_name'];
    $package_price = $_POST['package_price'];
    $package_locations = $_POST['package_locations'];

    // checking empty fields
    if(empty($package_name) || empty($package_price) || empty($package_locations)) {
        if(empty($name)) {
            echo "<style ='color:red'>Package name field is empty.<br/>";
        }

        if(empty($package_price)) {
            echo "<style ='color:red'>Package price field is empty.<br/>";
        }

        if(empty($package_locations)) {
            echo "<style ='color:red'>Package locations field is empty.<br/>";
        }
    } else {
        //updating the table
        $result = $con->query("UPDATE packages SET package_name='$package_name', package_price='$package_price', package_locations='$package_locations' WHERE packages. package_id =$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: admin-home.html");
    }
}
?>
<?php
//getting id from url
$id = $_GET['package_id'];

//selecting data associated with this particular id
$result = $con->query( "SELECT * FROM packages");

while($res = mysqli_fetch_array($result))
{
    $package_name = $res['package_name'];
    $package_price = $res['package_price'];
    $package_locations = $res['package_locations'];
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Global Tours and Events KE</title>
    <link href="css/admin-header.css" rel="stylesheet" type="text/css">
    <link href="css/admin-editpackage.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: #343838">
<br>
<br>
<section id="side-bar">
    <div>
        <div id="package-form">
            <form method="post" action="admin-edit.php">
                <input type="hidden" name="id" <?php echo $_GET['package_id'];?> >
                <label>Name of the Package</label>
                <br>
                <input type="text" name="package_name" placeholder="Enter the package name" value="<?php echo $package_name;?>" >
                <br>
                <label>Price of the package</label>
                <br>
                <input type="text" name="package_price" placeholder="Enter the package price" value="<?php echo $package_price;?>" >
                <br>
                <label>Package Details</label>
                <br>
                <input type="text" name="package_locations" placeholder="Enter the package locations" value="<?php echo $package_locations;?>" >
                <br>
                <br>
                <button>UPDATE PACKAGE</button>
            </form>
        </div>
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
            <a href="php/admin-packages.php" class="item"><img src="img/view.png">All Packages</a>
            <br>
            <a href="admin-booked.php" class="item"><img src="img/booked.png">Booked Packages</a>
            <br>
            <a href="admin-addpackage.html" class="item"><img src="img/add.png">Add Packages</a>
            <br>
            <a href="php/logout.php" class="item"><img src="img/logout.png">Log Out</a>
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