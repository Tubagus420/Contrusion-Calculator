<?php   
session_start(); //to ensure you are using same session
session_unset();
session_destroy(); //destroy the session
header("location:../admin/login.php"); //to redirect back to "index.php" after logging out
?>