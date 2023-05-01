<?php	
require'..\ppl\config\functions.php';

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}


$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];



$id = $_GET["id"];
if ( hidekomentar($id)>0){
 
    echo" <script>
        alert('Komentar ini telah disembunyikan!');
        document.location.href = 'komunitas.php'
        </script>";

    }else{
        echo" <script>
        alert('Komentar ini gagal disembunyikan!');
        document.location.href = 'komunitas.php'
        </script>";}
?>