<?php	
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
require 'functions.php';

$username=$_GET["username"];



$id = $_GET["id"];

    if ( hapussales($id)>0){
        echo" <script>
         alert('data berhasil dihapus!');
        document.location.href = 'datasales.php?username=$username'
         ";

        }else{
        echo" <script>
        alert('data gagal dihapus!');
        document.location.href = 'dataadmin.php?username=$username'
        </script>
        ";
}

?>