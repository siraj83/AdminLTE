<?php 
session_start();
session_unset();
session_destroy();
ob_end_flush();
header("Location: login.php");
exit(); 
?>