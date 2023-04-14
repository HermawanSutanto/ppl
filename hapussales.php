<?php	
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}



require 'functions.php';

$id = $_GET["id"];

    if ( hapussales($id)>0){
        echo" <script>
         alert('data berhasil dihapus!');
        document.location.href = 'indexadmin1.php'
        </script>
         ";

        }else{
        echo" <script>
        alert('data gagal dihapus!');
        document.location.href = 'indexadmin1.php'
        </script>
        ";
}

?>