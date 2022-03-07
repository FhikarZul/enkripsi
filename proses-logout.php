<?php 
session_start();
unset($_SESSION['status']);
unset($_SESSION['id_user']);
session_destroy();
header("location:login.php?m=logout");
?>