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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/~bassefa/assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" />
 <title>Contact Us</title>
</head>

<body>
    <?php
    $current_page = "contact";
    include  $_SERVER['DOCUMENT_ROOT'] . "/~bassefa/paths/layout/header.php";
    ?>

    <header class="jumbotron">
        <div class="container justify-content-center">
            <div class="row row-header">

                <div class="col-12 col-sm-8">
                    <h2>The Best Web Service for Corona Infections.</h2>
          <h5>This web app was created as a project of Software Engineering Module of Jacobs University Bremen.</h5>
        
                </div>
            </div>
        </div>
    </header>

    <div class="container">


            <div class="title">
                 
        <div class="row marketing my-5">
      <div class="col-lg-6">
        
      <a href="/~bassefa/paths/agency/agency_add_hospital.php "><button type="button" class="back">Add Hospitals</button></a>
               

      <a href="/~bassefa/paths/agency/agency_visitor.php"><button type="button" class="back">View Visitors</button></a>
               
      </div>

      <div class="col-lg-6">
      <a href="/~bassefa/paths/agency/agency_places.php"><button type="button" class="back">View Places</button></a>
               

      <a href="/~bassefa/paths/agency/agency_hospital.php"><button type="button" class="back">View Hospitals</button></a>


      </div>
    </div>
    </div>
  </div>

    <?php
    include  $_SERVER['DOCUMENT_ROOT'] . "/~bassefa/paths/layout/footer.php";
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>