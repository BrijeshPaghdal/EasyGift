<?php
session_start();
$_SESSION['admin_name'] = "";
session_unset();
header("Location:login.php");
?>
