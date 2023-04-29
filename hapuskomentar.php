<?php	
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
require 'functions.php';

$username=$_GET["username"];
$tabel=$_GET["tabel"];


$id = $_GET["id"];

if (hapuskomentar($id)>0){

    echo" <script>
    alert('data berhasil dihapus!');
   document.location.href = 'komunitas.php?username=$username&tabel=$tabel'
   </script>
    ";

   }else{
   echo" <script>
   alert('data gagal dihapus!');
   document.location.href = 'komunitas.php?username=$username&tabel=$tabel'
   </script>
   ";
}


?>