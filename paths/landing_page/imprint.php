<?php


// Initialize the session
$status = "Not Logged In";
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />

  <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
  <script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>

  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
 
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" />
  <title>Corona Archive</title>

</head>

<body>

<?php
    $current_page = "login_portal";
    include "../layout/header.php";
    ?>

    <div class="container-fluid">
    <div class="infoline">
        <h1>This web app was created as a project of Software Engineering Module of Jacobs University Bremen.</h1>
        <h3>This website in general can be considered as Covid Management System. This Project was created on sprint basis.</h3><br>
        <p><u> Sprint-03 </u> By:<br>1.
            Blen Assefa <br>
            2.
            Matias Merko <br>
        <p>
            Copyright &copy JUB
            <script>
                document.write(new Date().getFullYear());
            </script>
        </p>
    </div>

  </div>
    </div>
  </header>
  

  <!-- Footer -->
  <?php
    include "../layout/footer.php";
    ?>
  <!-- Footer -->
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>