<?php
// Initialize the session
$status = "Not Logged In";
session_start();

if (!isset($_SESSION["auser"]) && !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $status = "Not Logged In";
    header('Location: agency_login.php');
} else {
    $status = "Logged In";
}

?>

<!DOCTYPE html>

<head>
    <title>Corona Archive - Places List</title>
    <meta name="viewport" , content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="/~bassefa/paths/css/table.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/paths/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/paths/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/~bassefa/paths/css/style.css">
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

    $result = "SELECT * FROM VisitorToPlaces ";
    if (isset($_POST['submitbtn'])) {
        $placename = $_POST['placename'];
        $entrydate = $_POST['entrydate'];
        $exitdate = $_POST['exitdate'];
        $result .= "WHERE place_id='$placename' AND entry_date>='$entrydate' AND exit_date<='$exitdate'";
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
                <h3>View Visits to Places</h3>
                <hr>
            </div>
        </div>
        <form method="POST">
            <div class="row row-content">
                <div class="col-4">
                    <input type="text" id="searchuser" name="placename" placeholder="Enter Place" required>
                </div>
                <div class="col-3">
                    <input type="text" id="searchuser" name="entrydate" placeholder="Enter Entry Time" required>
                </div>
                <div class="col-3">
                    <input type="text" id="searchuser" name="exitdate" placeholder="Enter Exit Time" required>
                </div>
                <div class="col-2">
                    <input type="submit" value="Search" id="searchinput" name="submitbtn">
                </div>
            </div>
        </form>



        <div class="row row-content my-5">


            <!-- displaying the data from the database in the form of table  -->
            <table id="entity_table">
                <tr>
                    <th>Visitor ID</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
                <?php while ($array = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td> <?php echo $array["visit_id"]; ?> </td>
                        <td> <?php echo $array["place_id"]; ?> </td>
                        <td> <?php echo $array["entry_date"]; ?> </td>
                        <td> <?php echo $array["exit_date"]; ?> </td>
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