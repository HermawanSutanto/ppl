<?php	
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}

$username=$_SESSION["username"];

require 'functions.php';

$id = $_GET["id"];

    if ( hapuspetani($id)>0){
        echo" <script>
         alert('data berhasil dihapus!');
        document.location.href = 'datapetani.php'
        </script>
         ";

        }else{
        echo" <script>
        alert('data gagal dihapus!');
        document.location.href = 'datapetani.php'
        </script>
        ";
}

?>