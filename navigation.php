<?php
session_start();

// Logout logic
if (isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page after logout
    header("Location: login.php");
    exit();
}
?>

<header>

    <div class="container">
        <div class="toggle_container"> <button class="nav__toggle"><span class="hamburger"></span></button></div>

        <nav class="nav">
            <ul role="list" class="nav__list">
                <li class="nav__item"><a class="nav__link" href="home.php">Home</a></li>
                <li class="nav__item"><a class="nav__link" href="register.php">Register</a></li>
            </ul>
            <ul role="list" class="nav__list secondary">
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<li class='nav__item'><p class='center'>Welcome, {$_SESSION['user_name']}!</li>";
                    echo "<li class='nav__item'><form method='post'><button type='submit' class='nav__button' name='logout'>Logout</button></form></li>";
                } else {
                    echo "<li class='nav__item'><a class='nav__link' href='login.php'>Login</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>



</header>