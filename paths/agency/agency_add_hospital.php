<?php
// Initialize the session
$status = "Not Logged In";
session_start();

if (!isset($_SESSION["auser"]) && !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $status = "Not Logged In";
} else {
    $status = "Logged In";
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" , content="width = device-width, initial-scale=1">
    <title> Corona Archive - Add Hospitals </title>
    <link rel="stylesheet" href="/~bassefa/assets/css/t.css">
    <link rel="stylesheet" href="/~bassefa/assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" />
</head>

<body>

    <!-- Connecting the Database -->
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once "../auth/config.php";
    ?>
    <?php
    $current_page = "contact";
    include "../layout/header.php";;
    ?>


    <div class="container">
    <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="/~bassefa/paths/agency/agency_dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Add Hospitals</li>
            </ol>
            <div class="col-12">
                <h3>Add Hospitals</h3>
                <hr>
            </div>
        </div>



        <div class="row row-content ">
            <div class="form-box-pr">
                <div class="logo-hp">
                    <img src="../images/pl.jpg">
                </div>
                <form action="agency_add_hospital.php" method="post" class="input-grp">
                    <input type="text" name="name" class="input-field" placeholder="Hospital Username">
                    <input type="text" name="address" class="input-field" placeholder="Hospital Address">
                    <input type="password" name="password" class="input-field" placeholder="Hospital Password">
                    <input type="hidden" name="deviceID" id="deviceID" value="">
                    <input type="submit" name="signup" value="Add Hospital">
                </form>
            </div>
        </div>

        <?php
        // Getting the data ready, from the form, to be inserted into the db
        if (isset($_POST['signup'])) {
            $username = $_POST['name'];
            $address = $_POST['address'];
            $password = $_POST['password'];

            // Checking the constraints for the data for the Hospitals
            if ($username == '' || $address == '' || $password == '') {
                echo 'Information cannot be empty';
            } else {

                // Insert into database
                $sql = "INSERT INTO Hospital (hospital_username, hospital_address, hospital_password) VALUES ('$username', '$address', '$password')";
                if (mysqli_query($link, $sql)) {
                    header("Location:agency.php");
                    echo 'Hospital Added Successfully !';
                } else {
                    echo 'Failed to register';
                }
            }
        }

        ?>

    </div>

    <?php
    include  "../layout/footer.php";
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</body>

</html>