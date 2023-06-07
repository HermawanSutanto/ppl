<?php
session_start();
// cek session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
$username = $_SESSION["username"];

// koneksi ke database
// seolah olah file function ada di sini
require '..\ppl\config\functions.php';

//  PAGINATION


$sales = query("SELECT * FROM sales ORDER BY id DESC "); //ASC urut id membesar, DESC mengecil,

//limit membuat batasan data  yang ditampilkan index ke berapa,berapa data
//  ambil data dari database tabel admin / query

// tombol cari di klik
if (isset($_POST["cari"])) {
    $sales = carisales($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Data Sales</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="design/tabel.css">

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

                        <a href="halamanutama<?= $tabel; ?>.php" class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">




                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="halamanutamaadmin.php">Kembali</a></li>
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
                            <h6>About Us</h6>
                            <h2>Data Sales</h2>
                            <div class="btn btn-primary btn-sm" style="margin-top:30px;background-color:#E3B04B;border-color:#E3B04B;">
                                <h4 style="color:black;"><a style="font-style: unset;color:white;" href="tambahsales.php">Tambah Sales</a></h4>
                            </div>
                            <br>
                            <div style="font-family: arial;
                            font-size: 20px;
                            display: flex;
                            justify-content: left;
                            padding-top:20px;">
                                <form action="" method="post">
                                    <input type="text" name="keyword" id="keyword" size="40px" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
                                    <button type="submit" name="cari">cari</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

    </section>
    <br>

    <div style="display:flex;width:auto;justify-content:center;">
        <div style="width:1200px;margin:30px;margin-top:0px;overflow-x:auto;justify-content:center;">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <!-- kop tabel-->
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NomorHp</th>
                    <th>Perusahaan</th>
                    <th>TanggalLahir</th>
                    <th>JenisKelamin</th>
                    <th>Alamat</th>
                    <th>Kabupaten</th>
                </tr>
                <?php $i = 1 ?><!--  nomor urut -->
                <?php foreach ($sales as $row) : ?>
                    <tr>
                        <td><?= $i ?></td>

                        <td><?= $row["nama"];    ?></td>
                        <td><?= $row["email"];    ?></td>
                        <td><?= $row["nomorhp"];    ?></td>
                        <td><?= $row["perusahaan"];    ?></td>
                        <td><?= $row["tanggallahir"];    ?></td>
                        <td><?= $row["jeniskelamin"];    ?></td>
                        <td><?= $row["alamat"];    ?></td>
                        <td><?= $row["kabupaten"];    ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </table>
            <br>
        </div>
    </div>


    <!-- navigasi jumlah halaman -->


</body>

</html>