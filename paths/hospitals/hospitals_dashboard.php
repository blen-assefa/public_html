<?php


// Initialize the session
$status = "Not Logged In";
session_start();

if (!isset($_SESSION["huser"]) && !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" /> <title>Contact Us</title>
</head>

<body>
    <?php
    $current_page = "contact";
    include  $_SERVER['DOCUMENT_ROOT'] . "/~bassefa/paths/layout/header.php";
    ?>

    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">

                <div class="col-12 col-sm-8">
                    <h2>Corona Archive</h2>
                    <h5>This web app was created as a project of Software Engineering Module of Jacobs University Bremen.</h5>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <h3>Generate your QR Code</h3>
                <hr>
            </div>
        </div>



        <div class="row row-content my-5">
            <!-- connecting to the database  -->
            <?php

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            require_once "../auth/config.php";

            $email = $_SESSION['huser'];

            // getting data from the database 
            $result = mysqli_query($link, "SELECT * FROM Visitor");
            ?>

            <!-- showing the data from the database in the form of tables  -->
            <table id="entity_table">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Infected</th>
                </tr>
                <?php while ($array = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td> <?php echo $array["visitor_name"]; ?> </td>
                        <td> <?php echo $array["visitor_address"]; ?> </td>
                        <td> <?php echo $array["visitor_phone"]; ?> </td>
                        <td> <?php echo $array["visitor_email"]; ?> </td>
                        <td> <?php if ($array["infected"] == 0) {
                                    echo "not infected";
                                ?>
                                <button type="button" onclick="">Mark Infected</button>
                                <?php
                                    $array["infected"] == 0;
                                ?>
                            <?php
                                } else {
                                    echo "infected";
                            ?>
                                <button type="button">Mark Not Infected</button>
                            <?php
                                }; ?>
                        </td>
                    </tr>
                <?php } ?>

            </table>
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