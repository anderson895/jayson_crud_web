<?php

session_start(); // Start the session if not already started

session_destroy(); // Destroy all data registered to a session

header("Location: ../index.html"); // Redirect to the login page

exit(); // Terminate the script to prevent any further execution
?>
