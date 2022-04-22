<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" , content="width = device-width, initial-scale=1">
  <title> Corona Archive - Login </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/~bassefa/assets/css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
  <link rel="stylesheet" href="/~bassefa/assets/css/style.css">
  <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
  <script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet" />
</head>

<body>
<?php
    $current_page = "login";
    include "/~bassefa/paths/layout/header.php";
    ?>
<div class="container-fluid">
  
<div class="hp-text">
        <h1>Select Login Type</h1>
      </div>
      <div class="title">
        <a href="../visitors/visitor_login.php"><button type="button" class="Visitor">Visitor</button></a>
        <a href="../places/places_login.php"><button type="button" class="Place Owner">Place Owner</button></a>
        <a href="../agency/agency_login.php"><button type="button" class="Agent">Agent</button></a>
        <a href="../hospitals/hospitals_login.php"><button type="button" class="Hospital">Hospital</button></a>
      </div>
  </div>

  <?php
      include "/~bassefa/paths/layout/footer.php";
    ?>
     <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  


</body>

</html>