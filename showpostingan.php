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

if (showpostingan($id) > 0) {
    echo " <script>
        alert('Postingan ini telah ditampilkan!');
        document.location.href = 'komunitas.php'
        </script>";
} else {
    echo " <script>
        alert('Postingan ini gagal ditampilkan!');
        document.location.href = 'komunitas.php'
        </script>";
}
