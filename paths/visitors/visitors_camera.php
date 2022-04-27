<?php


// Initialize the session
$status = "Not Logged In";
session_start();

if (!isset($_SESSION["vuser"]) && !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $status = "Not Logged In";
    header('Location: ./visitor_login.php');
} else {
    $status = "Logged In";
}


// Include config file
require_once "../auth/config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//inserting visitor,place and entry date whenever a visitor enters a place (exit date is not known yet)
if (isset($_POST['enterplace'])) {
    $place_id = $_POST['place_id'];
    $device_id = $_POST['place_address'];
    $user = 1;

    $entrydate = date('Y-m-d H:i:s', time());


    $sql = "INSERT INTO VisitorToPlaces(visit_id, place_id, device_ID, entry_date) VALUES (?,?,?,?)";


    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ddss", $user, $place_id, $device_id, $entrydate);
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
           header("Location: ./visitors_timer.php");exit;
        } else {
            echo ('Error with execute: ' . htmlspecialchars($stmt->error));
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/~bassefa/assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/style.css">
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" />
    <title>Contact Us</title>
    <title>Visitors</title>
</head>

<body>
    <?php
    $current_page = "contact";
    include "../layout/header.php";
    ?>

    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">

                <div class="col-12 col-sm-8">
                    <h2>The Best Web Service for Corona Infections.</h2>
                    <h>This web app was created as a project of Software Engineering Module of Jacobs University Bremen.</h5>

                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <h3>Scan QR</h3>
                <hr>
            </div>
            <!-- creating the QR scanner  -->
            <div class="hp-text">
                <video id="preview"></video>
                <form action="visitors_camera.php" class="hp-text" method="post">
                    <input type="text" name="text" id="text" readonly="" placeholder="QR Data">
                    <input type="submit" id="enterplace" name="enterplace" value="enterplace">
                    <input type="text" id="place_name" class="input-hidden" name="place_name" value="" required>
                    <input type="text" id="place_address" class="input-hidden" name="place_address" value="" requrired>
                    <input type="text" id="place_id" class="input-hidden" name="place_id" value="" required>
                </form>

            </div>
        </div>



        <script type="text/javascript">
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            scanner.addListener('scan', function(content) {
                document.getElementById("text").value = content
                placename = content.substring(0, content.indexOf('+'))
                placeaddress = content.substring(content.indexOf('+') + 1, content.indexOf('/'))
                placeid = content.substring(content.indexOf('/') + 1, content.length)
                document.getElementById('place_name').value = placename
                document.getElementById('place_address').value = placeaddress
                document.getElementById('place_id').value = placeid
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
        </script>

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