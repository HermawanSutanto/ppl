<?php	
require'..\ppl\config\functions.php';

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];
if(isset($_POST["tambah"])){

    if (tambahmodul($_POST)>0){
        echo "<script>
        alert('modul baru berhasil ditambahkan!');
        </script>";
    }else{
        echo mysqli_error($conn);

    }

}
$modul = query("SELECT * FROM modul ORDER BY id ")

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
                        
                        <a href="index<?= $tabel;?>.php"class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                         
                        
                           	
                       
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="modul.php">Kembali</a></li> 
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
                            <h2>Tambah Modul</h2>

                        </div>
                       
            </div>
        </div>

</section>

<div style="margin:80px;margin-top:0px; padding-right:30px;">

<div class="tabelmodul">
<form action="" method="post" enctype="multipart/form-data">
    <ul>
            <li>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul"required>

            </li>
            <li>
                <label for="deskripsi">Deskripsi : </label>
                <input type="text" name="deskripsi" id="deskripsi" required>

            </li>
            <li>
                <label for="gambarsampul">Gambar Sampul : </label>
                <input type="file" name="gambarsampul" id="gambarsampul">
            </li>
            <li>
                <label for="video">Link video : </label>
                <input type="text" name="video" id="video"required>
            </li>
            <li>
                <label for="narasumber">Narasumber: </label>
                <input type="text" name="narasumber" id="narasumber"required>
            </li>
            <li>
                <label for="modul">Link Modul: </label>
                <input type="file" name="modul" id="modul">
            </li>
            
        <button type="submit" name="tambah">Tambah Modul</button>

        <a href="indexadmin1.php">Kembali</a>

    </ul>

</form>
</div>



</body>
</html>