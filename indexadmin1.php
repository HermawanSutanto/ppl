<?php

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$username=$_GET["username"];

// koneksi ke database
// seolah olah file function ada di sini
require'functions.php';

//  PAGINATION
$jumlahadataperhalaman = 2 ; //jumlah data/halaman
$jumlahdata = count(query("SELECT * FROM admin1"));//jumlah seluruh data
$jumlahhalaman = ceil($jumlahdata/$jumlahadataperhalaman);//hasil diulatkan keatas
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ; //ternari,

//halaman =2,awaldata =2
//halaman =3, awawldata=4
//menentukan data pertama di tiap halaman
$awaldata = ($jumlahadataperhalaman*$halamanaktif)-$jumlahadataperhalaman;

$admin1 = query("SELECT * FROM admin1 ORDER BY id DESC LIMIT $awaldata,$jumlahadataperhalaman");//ASC urut id membesar, DESC mengecil,

//limit membuat batasan data  yang ditampilkan index ke berapa,berapa data
//  ambil data dari database tabel admin1 / query

// tombol cari di klik
if(isset( $_POST["cari"])){
    $admin1 = cari($_POST["keyword"]);
    
}


?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="modul.php" class="active">Modul</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="datasales.php?username=<?= $username;?>">Lihat data Sales</a></li>
                            <li class="scroll-to-section"><a href="datapetani.php?username=<?= $username;?>">Lihat data petani</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="logout.php">logout</a></li> 
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="akun.php?username=<?= $username;?>">Akun</a></li> 
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

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>Halaman Admin</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Make A Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-01.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-02.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets/images/slide-03.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 <div>
    <div><!-- navigasi jumlah halaman -->

<div>
<h1>Data Admin</h1>
<br><br>
<div style="margin:10px;">
<div style="font-family: arial;
  font-size: 20px;
  display: flex;
  justify-content: center;
  background-color: blue;">
    <form action="" method="post">

    <input type="text" name="keyword" id="keyword" size="100" autofocus 
    placeholder="Masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari">Cari</button>

    </form>
</div>
</div>

<div style="font-family: arial;
  font-size: 20px;

  /* Center child horizontally*/
  display: flex;
  justify-content: center;background-color: blue;">

  <div style="width: auto;
  height:40px;
  background-color: red;">
    <?php	if($halamanaktif>1):?>
    <a href="?halaman=<?=$halamanaktif -1; ?> ">&laquo;</a>
    <?php	endif;?>

    <?php for ( $i = 1 ; $i <= $jumlahhalaman; $i ++):?>

    <?php	if($i == $halamanaktif):?>
    <a href="?halaman=<?= $i ; ?>" style="font-weight:bold; color:black;"> <?php echo$i	?></a>
    <?php	else:?>
    <a href="?halaman=<?= $i ; ?>"> <?php echo$i	?></a>
    <?php	endif;?>

    <?php endfor; ?>
    <?php	if($halamanaktif < $jumlahhalaman):?>
    <a href="?halaman=<?=$halamanaktif +1; ?> ">&raquo;</a>
    <?php	endif;?></div>
    

</div></div>
 <div >
<table border="1" cellpadding="10" cellspacing="0">

<tr>
<!-- kop tabel-->
<th>No.</th>
<th>Aksi</th>
<th>Nama</th>
<th>Email</th>
<th>NomorHp</th>
<th>JenisKelamin</th>
<th>Alamat</th>
</tr>
<?php $i=1?><!--  nomor urut -->
<?php foreach($admin1 as $row) :?>
<tr>
<td><?= $i?></td>
<td style="width:150px;">
    <a href="ubah.php?id=<?= $row["id"];	
    ?>">ubah</a> |
    <a href="hapus.php?id=<?= $row["id"];	
    ?>" onclick="return confirm('yakin akan menghapus?')">hapus</a>
</td>
<td><?= $row["nama"];	?></td>
<td><?= $row["email"];	?></td>
<td><?= $row["nomorhp"];	?></td>
<td><?= $row["jeniskelamin"];	?></td>
<td><?= $row["alamat"];	?></td>
</tr>
<?php $i++?>
<?php	endforeach; ?>
</table></div>
 </div>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>
