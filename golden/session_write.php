<?php 
session_start();
$_SESSION['number'] = $_POST['number'];
echo "Number = ". $_SESSION['number'];
?>