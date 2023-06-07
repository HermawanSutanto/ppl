<?php
require '..\ppl\config\functions.php';

session_start();
// cek session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}


$username = $_SESSION["username"];
$tabel = $_SESSION["tabel"];


$id = $_GET["id"];
$idpostingan = query("SELECT id_postingan FROM komentar WHERE id_komentar='$id'")[0];
$idpostingan = $idpostingan['id_postingan'];

if (hapuskomentar($id) > 0) {

    echo " <script>
    alert('data berhasil dihapus!');
   document.location.href = 'komentar.php?id=$idpostingan'
   </script>
    ";
} else {
    echo " <script>
   alert('data gagal dihapus!');
   document.location.href = 'komentar.php?id=$idpostingan'
   </script>
   ";
}
