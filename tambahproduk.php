<?php
require '..\ppl\config\functions.php';

session_start();
// cek session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
$username = $_SESSION["username"];
$tabel = $_SESSION["tabel"];
if (isset($_POST["tambah"])) {

    if (tambahproduk($_POST) > 0) {
        echo " <script>  
        alert('produk baru berhasil ditambahkan!');
       document.location.href = 'daftarproduk.php'
       </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
$sales = mysqli_query($conn, "SELECT * FROM sales WHERE username = '$username'");
$sales = mysqli_fetch_assoc($sales);


?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Data modul</title>
    <link rel="stylesheet" href="design/styleindex.css">

    <style>

    </style>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

        <title>Klassy Cafe - Restaurant HTML Template</title>

        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/index.css">

        <link rel="stylesheet" href="assets/css/owl-carousel.css">

        <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>

    </style>
</head>

<body>

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->

                        <a href="index<?= $tabel; ?>.php" class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">




                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="daftarproduk.php">Kembali</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <br>
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h2>Tambah Produk</h2>
                        </div>

                    </div>
                </div>

    </section>

    <div style="margin:80px;margin-top:0px; padding-right:30px;">

        <div class="tabelproduk">
            <form action="" method="post" enctype="multipart/form-data">

                <ul>

                    <li>
                        <label for="nama_produk">Nama Produk : </label>
                        <input type="text" name="nama_produk" id="nama_produk" required>

                    </li>
                    <li>
                        <label for="gambarproduk">Gambar Sampul : </label>
                        <input type="file" name="gambarproduk" id="gambarproduk">
                    </li>
                    <li>
                        <label for="deskripsi">Deskripsi : </label>
                        <input type="text" name="deskripsi" id="deskripsi" required>

                    </li>

                    <li>
                        <label for="jumlah_stok">jumlah stok : </label>
                        <input type="text" name="jumlah_stok" id="jumlah_stok" required>
                    </li>
                    <input type="hidden" name="username" value="<?= $sales["username"]; ?>">



                    <button type="submit" name="tambah">Tambah produk</button>



                </ul>

            </form>
        </div>



</body>

</html>