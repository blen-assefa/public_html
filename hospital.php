<?php
    session_start();
    if(!isset($_SESSION['huser'])){
        header('Location: hospital_login.php');
    } else {
?>

<html>

<head>
<meta name = "viewport", content="width = device-width, initial-scale=1">
<link rel = "stylesheet" href = "table.css">
</head>

<body> 
    <ul>
        <li> <button class="button" > <a href="hospital_logout.php" class="back"> Log out </a> </button> </li>
    </ul>

    <h1> Citizens list </h4>
    <br>

    <?php 
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("connect.php");

    $result = mysqli_query($conn, "SELECT * FROM Visitor");
    ?>

    <table id="entity_table">
        <tr> <th>Name</th> <th>Address</th> <th>Phone</th> <th>Email</th> <th>Infected</th> </tr>
        <?php while ($array = mysqli_fetch_assoc($result)) { ?>
        <tr><td> <?php echo $array["visitor_name"]; ?> </td>
        <td> <?php echo $array["visitor_address"]; ?> </td>
        <td> <?php echo $array["visitor_phone"]; ?> </td>
        <td> <?php echo $array["visitor_email"]; ?> </td>
        <td> <?php if ($array["infected"] = 0) {
                            echo "infected";
                    }else {
                        echo "not infected";
        }; ?> </td></tr>
        <?php } ?>
    
    </table>





</body>

</html>

<?php
    }
?>