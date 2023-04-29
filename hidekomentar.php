<?php	
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$username=$_GET["username"];
$tabel=$_GET["tabel"];


require 'functions.php';

$id = $_GET["id"];
if ( hidekomentar($id)>0){
 
    echo" <script>
        alert('Komentar ini telah disembunyikan!');
        document.location.href = 'komunitas.php?username=$username&tabel=$tabel'
        </script>";

    }else{
        echo" <script>
        alert('Komentar ini gagal disembunyikan!');
        document.location.href = 'komunitas.php?username=$username&tabel=$tabel'
        </script>";}
?>