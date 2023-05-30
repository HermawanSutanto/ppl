<?php
require '..\ppl\config\functions.php';
session_start();
// cek session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
$username = $_SESSION["username"];
$tabel = $_SESSION["tabel"];





?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Data Sales</title>
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="design/tabel.css">
    <link rel="stylesheet" href="kartu.css">

    <style>

    </style>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cards</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/index.css">

        <link rel="stylesheet" href="assets/css/owl-carousel.css">

        <link rel="stylesheet" href="assets/css/lightbox.css">
        <link rel="stylesheet" href="modul/style.css">


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
                            <li class="scroll-to-section"><a href="halamanutama<?= $tabel; ?>.php">Kembali</a></li>
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


    <body>

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10" style="padding-left:0;padding-top:100px;justify-content:center; display:flex;align-items:center; ">
                        <div class="wrap d-md-flex">
                            <div class="img" style="background-image: url(assets/images/pexels-tomas-anunziata-3876417.jpg);">
                            </div>
                            <div class="login-wrap p-4 p-md-5" style="justify-content:center; display:table-cell;align-items:center; ">
                                <div style="text-align:center;justify-content:center;display:flex;">
                                    <h1>Trend Pasar</h1>
                                </div>
                                <br>
                                <br>
                                <br>
                                <iframe class="trend" src="https://siskaperbapo.jatimprov.go.id/harga/tabel" frameborder="0" width="1000px" height="640px"></iframe>


                            </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>


    </body>
    <script src="modul/script.js"></script>

</html>