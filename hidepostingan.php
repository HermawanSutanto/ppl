<?php	
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}


$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];

require 'functions.php';

$id = $_GET["id"];

    if ( hidepostingan($id)>0){
    echo" <script>
        alert('Postingan ini telah disembunyikan!');
        document.location.href = 'komunitas.php'
        </script>";

    }else{
        echo" <script>
        alert('Postingan ini gagal disembunyikan!');
        document.location.href = 'komunitas.php'
        </script>";}

?>