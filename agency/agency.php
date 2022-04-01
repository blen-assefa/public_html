<?php
session_start();
if (!isset($_SESSION['auser'])) {
    header('Location: agency_login.php');
} else {
?>

    <html>

    <head>
        <title>Corona Archive - Agent Options</title>
        <meta name="viewport" , content="width = device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/table.css">
        <link rel="stylesheet" href="../css/t.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div class="hero">
            <a href="agency_logout.php" class="back"><button class="back-btn"> Log Out </button></a>

            <div class="title">
                <a href="agency_add_hospital.php"><button type="button" class="back">Add Hospitals</button></a>
                <!-- <div id="t1"> -->
                <!-- <a href="agency_visitor.php" class="back"> View Visitors list </a> <br> -->
                <a href="agency_visitor.php"><button type="button" class="back">View Visitors</button></a>

                <!-- </div> -->
                <!-- <br> -->
                <!-- <div id="t2"> -->
                <a href="agency_places.php"><button type="button" class="back">View Places</button></a>
                <!-- </div> -->
                <!-- <br> -->
                <!-- <div id="t2"> -->
                <a href="agency_hospital.php"><button type="button" class="back">View Hospitals</button></a>
                <!-- </div> -->

            </div>


            <!-- <a href="" class="back">
                <form action="agency.php">
                    <input type="text" placeholder="Search.." name="search">
                </form>
            </a> -->

            <!-- <form action="agency.php">
                <input type="text" placeholder="Search.." name="search">
            </form> -->
        </div>





    </body>

    </html>
<?php
}
?>