<?php
session_start();
if (!isset($_SESSION['vuser'])) {
    header('Location: visitor_login.php');
} else {
?>
    <html>

    <head>
        <title>Instascan</title>
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
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

            <a href="visitor_logout.php" class="back"><button class="back-btn"> Log Out </button></a>

            <!-- <ul>
                <li> <button class="button"> <a href="visitor_logout.php" class="back"> Log out </a> </button> </li>
            </ul> -->

            <div class="scanner">

            <div class="hp-text">
                <h2>
                    <label>Scan QR Code !</label>
                </h2>
            </div>

            <div class="hp-text">
                <video id="preview"></video>
                <!-- <input type="text" name="text" id="text" readonly="" placeholder="scan qr"> -->
                <script type="text/javascript">
                    let scanner = new Instascan.Scanner({
                        video: document.getElementById('preview')
                    });
                    scanner.addListener('scan', function(content) {
                        document.getElementById("text").value = content
                        // window.location.replace(content);
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
                <div class="hp-text">
                    <input type="text" name="text" id="text" readonly="" placeholder="scan qr">
                </div>

            </div>
            </div>
        </div>

    </body>

    </html>
<?php
}
?>