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

//Updating the database with exit date whenever the visitor presses "leave"
if (isset($_POST['button'])) {
  
    $exitdate = date('Y-m-d H:i:s', time());
    $user = $_SESSION['vuser'];
    $sql = "UPDATE VisitorToPlaces SET exit_date=? WHERE visit_id=?";
  

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "sd", $exitdate, $user);
        // Attempt to execute the prepared statement
       
        if (mysqli_stmt_execute($stmt)) {
           header("Location: ./visitors_camera.php");
           exit;
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
    <link rel="stylesheet" href="/assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
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
                    <h2>You are in!</h2>
                    <div class="timerbox">
                <span id="minutes" style="font-size:50px;" >00</span><span style="font-size:50px;">:</span><span id="seconds" style="font-size:50px;" >00</span>
                <br>
                <form method="post">
                    <input type="submit" value="Leave place" name="button" id="leavebutton">
                </form>
            </div>

                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">

            
            <script type="text/javascript">
                // this javascript makes a timer m:s
                var sec = 0;

                function pad(val) {
                    return val > 9 ? val : "0" + val;
                }
                setInterval(function() {
                    document.getElementById("seconds").innerHTML = pad(++sec % 60);
                    document.getElementById("minutes").innerHTML = pad(parseInt(sec / 60, 10));
                }, 1000);
            </script>
          
        </div>





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