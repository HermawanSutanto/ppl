<?php	
require'..\ppl\config\functions.php';

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}

$username=$_SESSION["username"];


$id = $_GET["id"];

    if ( hapuspetani($id)>0){
        echo" <script>
         alert('data berhasil dihapus!');
        document.location.href = 'daftarpetani.php'
        </script>
         ";

        }else{
        echo" <script>
        alert('data gagal dihapus!');
        document.location.href = 'daftarpetani.php'
        </script>
        ";
}

?>