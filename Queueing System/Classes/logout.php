<?php
//start session
session_start();

//before we can logout we must first:
session_unset(); //Unset all session variables
session_destroy(); //Destroy the session

    //Redirect to the login page after logging out
    header("Location: ../Classes/login.php");  //Redirect to admin page
    exit();
?>