<?php

session_start();

// Check if the user is not logged in or session has expired
// $session_timeout = 60 * 60; // 60 minutes (in seconds)
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    // Clear session data
    session_unset();
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();
}

?>