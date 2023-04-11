<?php	
session_start();	
require 'functions.php';
if (!isset($_SESSION["login"])){
    header("Location: loginsales.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Halaman Dashboard sales</title>
<style>
</style>
</head>
<body> 
<a href="logout.php">Logout</a>
</body>
</html>