

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand px-5" href="#">Corona Archive</a>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item  px-2">
                <a class="nav-link <?php echo ($current_page === 'index') ? 'active' : ''; ?>" href="/index.php">Home</a>
            </li>
           
            <li class="nav-item px-2">
                <a class="nav-link <?php echo ($current_page === 'about') ? 'active' : ''; ?> " href="/~bassefa/paths/landing_page/about_us.php">About us</a>
            </li>
          
            <?php
            
            // Check if the user is logged in, if not then redirect him to login page
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                echo "<li class=\"nav-item px-2\"><a class=\"nav-link <?php echo ($current_page === 'login') ? 'active' : ''; ?> \"  href=\"/~bassefa/paths/auth/login_portal.php\">Log in</a></li>";
                echo "<li class=\"nav-item px-2 \"><a class=\"nav-link <?php echo ($current_page === 'register') ? 'active' : ''; ?> \" href=\"/~bassefa/paths/auth/register_portal.php\">Register</a></li>";
            } else {
                echo "<li class=\"nav-item px-2\"><a class=\"nav-link\" href=\"/~bassefa/paths/auth/logout.php\">Log out</a></li>";
            }
            ?>
        </ul>
        
    </div>
</nav>