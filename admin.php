<?php
    // Start the session
    ob_start();
    session_start();

    // Check to see if actually logged in. If not, redirect to login page
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header("Location: loginSignUp.php");
    }
?>


<html>
    <header>
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    </header>
    
    
    <?php include"includes/footer.php" ?>;
</html>


