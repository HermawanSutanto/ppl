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

    if ( hapusmodul($id)>0){
        echo" <script>  
         alert('data berhasil dihapus!');
        document.location.href = 'modul.php?username=$username&tabel=$tabel'
        </script>
         ";

        }else{
        echo" <script>
        alert('data gagal dihapus!');
        document.location.href = 'modul.php?username=$username&tabel=$tabel'
        </script>
        ";
}

?>