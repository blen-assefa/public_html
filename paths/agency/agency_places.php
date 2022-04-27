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

<head>
    <title>Corona Archive - Places List</title>
    <meta name="viewport" , content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="/~bassefa/assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" />

</head>

<body>

    <!-- connecting to the database  -->
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once "../auth/config.php";

    // getting data from the database 
    $result = "SELECT * FROM Places";
    if (isset($_POST['submitbtn'])) {
        $placename = $_POST['searchplace'];
        $result .= " WHERE place_name='$placename'";
    }
    $query = mysqli_query($link, $result);
    ?>
    <?php
    $current_page = "contact";
    include "../layout/header.php";
    ?>

    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">

                <div class="col-12 col-sm-8">
                    <h2>Corona Archive
                    </h2>
                    <h5>This web app was created as a project of Software Engineering Module of Jacobs University Bremen.</h5>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="/~bassefa/paths/agency/agency_dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">View Places</li>
            </ol>
            <div class="col-12">
                <h3>View Places</h3>
                <hr>
            </div>
        </div>
        <form method="POST">
            <div class="row row-content">
                <div class="col-6">
                    <input type="text" id="searchuser" name="searchplace" placeholder="Search by name">
                </div>
                <div class="col-3">
                    <input type="submit" value="Search" id="searchinput" name="submitbtn">
                </div>
                <div class="col-3">
                    <input type="submit" value="Reset Table" id="searchinput" name="resetbtn">
                </div>
            </div>
        </form>



        <div class="row row-content my-5">

            <table id="entity_table">
                <tr>
                    <th>Place</th>
                    <th>Address</th>
                </tr>
                <?php while ($array = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td> <?php echo $array["place_name"]; ?> </td>
                        <td> <?php echo $array["place_address"]; ?> </td>
                    </tr>
                <?php } ?>

            </table>

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