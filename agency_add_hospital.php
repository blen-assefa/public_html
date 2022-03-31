<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" , content="width = device-width, initial-scale=1">
    <title> Corona Archive </title>
    <!-- <p style = "font-family:georgia,garamond,serif;font-size:70px;">
  <b> WELCOME TO THE UEFA CHAMPIONS LEAGUE INFO PAGE!</b> </p> -->
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
    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("connect.php");
    ?>

    <div class="hero">
        <a href="index.php" class="back"><button class="back-btn"> Home </button></a>
        <a href="agency.php" class="back"><button class="back-btn"> Go back </button></a>
        <div class="form-box-pr">
            <div class="hp-text">
                <h2>Add Hospitals Here !</h2>
            </div>
            <div class="logo-hp">
                <img src="./images/pl.jpg">
            </div>
            <form action="agency_add_hospital.php" method="post" class="input-grp">
                <input type="text" name="name" class="input-field" placeholder="Hospital Username">
                <input type="text" name="address" class="input-field" placeholder="Hospital Address">
                <input type="password" name="password" class="input-field" placeholder="Hospital Password">
                <input type="hidden" name="deviceID" id="deviceID" value="">
                <input type="submit" name="signup">
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['signup'])) {
        $username = $_POST['name'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        if ($username == '' || $address == '' || $password == '') {
            echo 'Information cannot be empty';
            // } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) { // Name Constraint
            //     echo 'Invalid name';
            //     error_log("Invalid name", 0);
            // } elseif (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $email)) { // Email Constraint
            //     echo 'Invalid email';
            //     error_log("Invalid email", 0);
        } else {

            // Insert into database
            $sql = "INSERT INTO Hospital (hospital_username, hospital_address, hospital_password) VALUES ('$username', '$address', '$password')";
            if (mysqli_query($conn, $sql)) {
                header("Location:agency.php");
                echo 'Hospital Added Successfully !';
            } else {
                echo 'Failed to register';
            }
        }
    }

    ?>




</body>

</html>