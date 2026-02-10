<?php
session_start();
session_destroy(); // Destroy the login session
header("Location: login.php"); // Redirect back to login
exit;
?>