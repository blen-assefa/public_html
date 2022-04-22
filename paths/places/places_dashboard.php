<?php
session_start();
// Include config file
require_once "../auth/config.php";


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = $_SESSION['puser'];

// Initialize the session
$status = "Not Logged In";


// Define variables and initialize with empty values
$event_name = $event_date = "";

if (!isset($_SESSION["puser"]) && !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $status = "Not Logged In";
} else {
    $status = "Logged In";
}

$a = $b = $c =  $d = "";

// getting data from the database 
$search = "SELECT * FROM Places WHERE place_email like '$email'";

// declaring variables for the data from the db 
$result = mysqli_query($link, $search);
$queryResults = mysqli_num_rows($result);
if ($queryResults > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $a = $row["place_id"];
        $b = $row["place_name"];
        $c = $row["place_address"];
        $d = $row["place_email"];
    }
}


$result_qrcodes = mysqli_query($link, "SELECT * FROM EventsForPlaces WHERE place_id = ". $a);



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate event_name
    if (empty(trim($_POST["event_name"]))) {
        $event_name_err = "Please enter a event name.";
    } else {
        $event_name = trim($_POST["event_name"]);
    }

    // Validate password
    if (empty(trim($_POST["event_date"]))) {
        $event_date_err = "Please enter a date.";
    } else {
        $event_date = date('Y-m-d', strtotime($_POST['event_date'])); 
    }

    include($_SERVER['DOCUMENT_ROOT'] . '/lib/phpqrcode/qrlib.php');
    // how to save PNG codes to server

    $tempDir = $_SERVER['DOCUMENT_ROOT'] . "/data/";

    $codeContents = $event_name . '+' .  $event_date;


    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_' . md5($codeContents) . '.png';

    $pngAbsoluteFilePath = $tempDir . $fileName;
    $urlRelativeFilePath = $_SERVER['DOCUMENT_ROOT'] . "/data/" . $fileName;

    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
    }


    // Check if it doesn't exit

    $sql = "SELECT E.event_name, E.event_date FROM EventsForPlaces E WHERE E.event_name = ? AND E.event_date = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_event_name, $param_event_date);

        // Set parameters
        $param_event_name = trim($_POST["event_name"]);
        $param_event_date = date('Y-m-d', strtotime($_POST['event_date'])); 

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            /* store result */
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                $username_err = "This Event informations is already taken.";
            } else {
                $event_name = trim($_POST["event_name"]);
                $event_date = trim($_POST["event_date"]);
            }
        } else {
            echo "Oops! Something went wrong. Please try again later. Select query error";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Add it to both image and eventimages
    // Prepare an insert statement
    //Agent (agent_id, agent_username, agent_password)
    $sqlEvent = "INSERT INTO EventsForPlaces (event_id, event_name,  place_id, image_id, event_date) VALUES (?, ?, ?, ?, ?)";
    $sqlImage = "INSERT INTO Images (image_id, image) VALUES (?, ?)";
    $param_image_id = rand(1, 100000000);
    $param_event_id = rand(1, 100000000);

   
    if ($stmt = mysqli_prepare($link, $sqlImage)) {

        // Get file info 
        $imgContent = file_get_contents($pngAbsoluteFilePath);

        mysqli_stmt_bind_param($stmt, "ds", $param_image_id, $imgContent);
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
           // echo "Successfully Stored Image in SQL Server\n";
        } else {
            echo ('Error with execute: ' . htmlspecialchars($stmt->error));
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    if ($stmt = mysqli_prepare($link, $sqlEvent)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "dsdds", $param_event_id, $param_event_name, $a, $param_image_id, $param_event_date);

        // Set parameters

        $param_event_name = $event_name;
        $param_place_id = $a;
        $param_event_date = date('Y-m-d', strtotime($_POST['event_date'])); 

        // Attempt to execute th e prepared statement
        if (mysqli_stmt_execute($stmt)) {
            //echo "Successfully added Event!";
        } else {

            //echo "Oops! Something went wrong. Please try again later. Insert query error in events";
             echo ('Error with execute: ' . htmlspecialchars($stmt->error));
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }



    // Display it as a list 
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" />
    <title>Contact Us</title>

    <title>Contact Us</title>
</head>

<body>
    <?php
    $current_page = "contact";
    include  $_SERVER['DOCUMENT_ROOT'] . "/paths/layout/header.php";
    ?>

    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">

                <div class="col-12 col-sm-8">
                    <h2>The Best Web Service for Corona Infections.</h2>
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


            <!-- showing the data about that logged in place using the variables -->
            <div class="col-12">
                <div class="data">
                    <div class="text">
                        <b>Place ID:</b>
                        <?php echo "<b style=\"color:black\">" . $a . "</b>"; ?>
                        <br><b>Place Name:</b>
                        <?php echo "<b style=\"color:black\">" . $b . "</b>"; ?>
                        <br><b>Place Address:</b>
                        <?php echo "<b style=\"color:black\">" . $c . "</b>"; ?>
                        <br><b>Place Email:</b>
                        <?php echo "<b style=\"color:black\">" . $d . "</b>"; ?>
                    </div>
                    <div class="hp-text">
                        <b> Get the QR code by clicking "Get QR" below for your specific event!</b>
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="event_name" class="form-control" id="event_name" placeholder="Event Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10 input-with-post-icon datepicker">
                                <input name="event_date" placeholder="Select date" type="date" id="event_date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="submit" id="button1" value="Get QR">
                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <h3>Generated QR Codes</h3>
                <hr>
            </div>


            <?php if ($result_qrcodes && mysqli_num_rows($result_qrcodes) > 0) {
                
                while ($array = mysqli_fetch_assoc($result_qrcodes)) { ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <?php
                                // getting data from the database 
                                $sqlImageFetch = "SELECT * FROM Images WHERE image_id = " . $array["image_id"] . ";";
                             
                                $result_image = mysqli_query($link, $sqlImageFetch); 

                                if(isset($_GET['Download'])) {
                                    $file_content = base64_decode($array_image["image"]);
                                    echo "I made it here";
                                    file_put_contents('./'. $array["event_name"], $file_content);
                                }
                                

                               

                                while ($array_image = mysqli_fetch_assoc($result_image)){
                       
                                    echo '<img src="data:image/png;base64,' . base64_encode($array_image["image"]) . '" />';
                                    echo '<input type="submit" name="Download" value="Download" class="btn btn-secondary">' ;
                                }



                              
                                
                               
                                ?>
                           
                            </div>
                            <div class="col-sm">
                                <h2><?php echo $array["event_name"]; ?></h2>
                                <h2><?php echo $array["event_date"]; ?></h2>
                            </div>
                        </div>
                    </div>
                <?php }
            } else {

                ?> <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h2>No events found yet!</h2>
                        </div>
                    </div>
                </div> <?php }

                        ?>


        </div>

    </div>

    <?php
    include  $_SERVER['DOCUMENT_ROOT'] . "/paths/layout/footer.php";
    
    // Close connection
    mysqli_close($link);
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>