<?php	
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$username=$_GET["username"];


require 'functions.php';

$id = $_GET["id"];

    if ( hapus($id)>0){
        echo" <script>
         alert('data berhasil dihapus!');
        document.location.href = 'dataadmin.php?username=$username'
        </script>
         ";

        }else{
        echo" <script>
        alert('data gagal dihapus!');
        document.location.href = 'dataadmin.php?username=$username'
        </script>
        ";
}

?>