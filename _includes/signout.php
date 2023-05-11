<?php

// unset all variables, destroy the session, and redirect to sign in page.
session_start();
$_SESSION["username"] = "";
session_destroy();
session_abort();
header('location: ../signin.php');

exit; 

?>