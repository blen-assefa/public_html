<html>

<head>
</head>

<body>

    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("connect.php");
    ?>

    <ul>
        <a href="test.html" class="back"> Go back </a>
    </ul>

    <h3> Log in </h3>
    <form action="testagent.php" method="post">
        Username:<input type="text" name="username"><br>
        Password:<input type="password" name="password"><br><br>
        <input type="submit" name="login">
    </form>

    <?php
    if (isset($_POST['login'])) {

        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = mysqli_query($link, "SELECT agent_username, agent_password FROM Agent WHERE agent_username = '$username' AND agent_password = '$password'");

            $array = mysqli_fetch_assoc($result);

            if ($array != NULL) {
                echo "Successful Login";
            } else {
                echo "Invalid Login, Please Try Again";
                error_log("Invalid login", 0);
            }
        } else {
            echo "All Fields Are Required!";
            error_log("Empty required fields", 0);
        }
    }

    ?>

</body>

</html>