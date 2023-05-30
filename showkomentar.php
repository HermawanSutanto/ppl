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
$komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE id_komentar='$id'");
$idpostingan = mysqli_fetch_assoc($komentar);
$id_postingan = $idpostingan['id_postingan'];

if (showkomentar($id) > 0) {

    echo " <script>
        alert('Komentar ini telah ditampilkan!');
        document.location.href = 'komentar.php?id=$id_postingan'
        </script>";
} else {
    echo " <script>
        alert('Komentar ini gagal ditampilkan!');
        document.location.href = 'komentar.php?id=$id_postingan'
        </script>";
}
