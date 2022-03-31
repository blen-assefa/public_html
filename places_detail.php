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
    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("con.php");
    // echo("$_POST[No_of_hrs_worked]");


    // if (isset($_POST["search"])) {
    $food_name = $_GET['Food'];
    // database search SQL code


    $search1 = "SELECT * FROM Menu WHERE DishID=$food_name";
    // $search2 = "SELECT * FROM Chef WHERE SignatureDish like '$food_name'";


    $result = mysqli_query($conn, $search1);
    $queryResults = mysqli_num_rows($result);
    if ($queryResults > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $a = $row["Food"];
            echo ".$a.";
            $b = $row["DishID"];
            echo ".$b.";
            $c = $row["Drinks"];
            echo ".$c.";
            $d = $row["TodaysSpecial"];
            echo ".$d.";
        }
    }

    // $result = mysqli_query($conn, $search2);
    // $queryResults = mysqli_num_rows($result);
    // if ($queryResults > 0) {
    //     // while ($row = mysqli_fetch_assoc($result)) {
    //         $ChefID=$_GET['Chef_ID'];
    //         $Expe=$_GET['Years_worked'];
    //     }
    // }


    // }
    ?>
    <div class="data">
        <img src="photo.jpg" width="300px" height="300px"><br>
        <hr width="500px">
        <div class="text">
            <b>Name:</b>
            <?php echo "<b style=\"color:blue\">" . $a . "</b>"; ?>
            <br><b>Food ID:</b>
            <?php echo "<b style=\"color:blue\">" . $b . "</b>"; ?>
            <br><b>Drinks With It:</b>
            <?php echo "<b style=\"color:blue\">" . $c . "</b>" ?>
            <br><b>Today's Special:</b>
            <?php echo "<b style=\"color:blue\">" . $d . "</b>" ?>
            <!-- <br><b>ID of Special Chef for this:</b> -->
            <!-- <?php echo "<b style=\"color:blue\">" . $ChefID . "</b>" ?>
            <br><b>Experience of Chef(Years):</b>
            <?php echo "<b style=\"color:blue\">" . $Expe . "</b>" ?>    -->
        </div>
        <br>
        <br>
        <button><a href="index.html" style="text-decoration: none;">
                Search Page
            </a></button>
    </div>
</body>

</html>