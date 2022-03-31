<?php
session_start();
if (!isset($_SESSION['puser'])) {
    header('Location: places_register.php');
}
// if(isset($_SESSION['puser'])) {
//     session_start();
else {
?>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="t.css">
        <link rel="stylesheet" href="table.css">

        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" />

    </head>

    <body>
        <div class="hero">
            <a href="places_register.php" class="back"><button class="back-btn"> Go back </button></a>

            <div class="form-box-pr">

                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include("connect.php");

                // if (isset($_POST["search"])) {
                $email = $_SESSION['puser'];
                // database search SQL code

                $search = "SELECT * FROM Places WHERE place_email like '$email'";

                $result = mysqli_query($conn, $search);
                $queryResults = mysqli_num_rows($result);
                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $a = $row["place_id"];
                        // echo ".$a.";
                        $b = $row["place_name"];
                        // echo ".$b.";
                        $c = $row["place_address"];
                        // echo ".$c.";
                    }
                }

                ?>

                <?php echo "<h1 style=\"color:black\">" . $b . "</h1>"; ?>
                <div class="hp-text">
                    <h2> Get the QR code by clicking "Get QR" below !</h2>
                </div>

                <input type="text" value="Place ID: <?php echo $a ?>, Place: <?php echo $b ?>,  Address: <?php echo $c ?>" id="qr-data">
                <!-- <a href=""><button type="button" id="button1" onclick="generateQR()"> Get QR </button></a> -->
                <input type="submit" id="button1" onclick="generateQR()" value="Get QR">

                <div id="qrcode">
                    <script type="text/javascript" src="qr_generator.js"></script>
                </div>
            </div>
        </div>

    </body>

    </html>
<?php
}
?>