<?php
session_start();
if (!isset($_SESSION['puser'])) {
    header('Location: places_login.php');
} else {
?>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="t.css">
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
            <a href="places_logout.php" class="back"><button class="back-btn"> Log Out </button></a>
            <div class="infoline">


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
                        $d = $row["place_email"];
                    }
                }

                ?>
                <div class="form-box-pr">
                    <div class="data">
                        <div class="logo-hp">
                            <img src="./images/pl.jpg">
                        </div>
                        <hr width="500px">
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
                            <b> Get the QR code by clicking "Get QR" below !</b>
                        </div>
                        <input type="" value="Place ID: <?php echo $a ?>, Place: <?php echo $b ?>,  Address: <?php echo $c ?>" id="qr-data">
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