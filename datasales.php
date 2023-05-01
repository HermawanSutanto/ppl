<?php
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$username=$_GET["username"];

// koneksi ke database
// seolah olah file function ada di sini
require'..\ppl\config\functions.php';

//  PAGINATION
$jumlahadataperhalaman = 2 ; //jumlah data/halaman
$jumlahdata = count(query("SELECT * FROM sales"));//jumlah seluruh data
$jumlahhalaman = ceil($jumlahdata/$jumlahadataperhalaman);//hasil diulatkan keatas
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ; //ternari,

//halaman =2,awaldata =2
//halaman =3, awawldata=4
//menentukan data pertama di tiap halaman
$awaldata = ($jumlahadataperhalaman*$halamanaktif)-$jumlahadataperhalaman;

$sales = query("SELECT * FROM sales ORDER BY id DESC LIMIT $awaldata,$jumlahadataperhalaman");//ASC urut id membesar, DESC mengecil,

//limit membuat batasan data  yang ditampilkan index ke berapa,berapa data
//  ambil data dari database tabel admin1 / query

// tombol cari di klik
if(isset( $_POST["cari"])){
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
                        
                        <a href="index<?= $tabel;?>.php?username=<?= $username;?>"class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                         
                        
                           	
                       
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="indexadmin1.php?username=<?= $username;?>">Kembali</a></li> 
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
                            <div style="margin-top:30px;margin-bottom:30px;"><h4 style="color:black;"><a style="font-style: unset;color:black;" href="registrasisales.php?username=<?= $username;?>">Tambahkan Sales</a></h4></div>

                            <div style="font-family: arial;
                            font-size: 20px;
                            display: flex;
                            justify-content: left;">
                                <form action="" method="post">

                                <input type="text" name="keyword" id="keyword" size="40px" autofocus 
                                placeholder="Masukkan keyword pencarian" autocomplete="off">
                                <button type="submit" name="cari">cari</button></form></div>

                        </div>
            </div>
        </div>

</section>





<div style="font-family: arial;
  font-size: 20px;

  /* Center child horizontally*/
  display: flex;
  justify-content: center;">

  <div style="width: auto;
  height:20px;     
  ">
    <?php	if($halamanaktif>1):?>
        <a href="?halaman=<?=$halamanaktif -1; ?> ">&laquo;</a>
    <?php	endif;?>
    <br>

    <?php for ( $i = 1 ; $i <= $jumlahhalaman; $i ++):?>

        <?php	if($i == $halamanaktif):?>
        <a href="?halaman=<?= $i ; ?>" style="font-weight:bold; color:black;"> <?php echo$i	?></a>
        <?php	else:?>
        <a href="?halaman=<?= $i ; ?>"> <?php echo$i	?></a>
        <?php	endif;?>

    <?php endfor; ?>
    <?php	if($halamanaktif < $jumlahhalaman):?>
        <a href="?halaman=<?=$halamanaktif +1; ?> ">&raquo;</a>
    <?php	endif;?>
  </div>
</div>
<br>
<br>

<div style="margin:30px;margin-top:0px;overflow-x:auto;">

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <!-- kop tabel-->
    <th>No.</th>
    <th>Aksi</th>
    <th>Nama</th>
    <th>Email</th>
    <th>NomorHp</th>
    <th>Perusahaan</th>
    <th>TanggalLahir</th>
    <th>JenisKelamin</th>
    <th>Alamat</th>
</tr>
<?php $i=1?><!--  nomor urut -->
<?php foreach($sales as $row) :?>
<tr>
    <td><?= $i?></td>
    <td style="width:150px; opacity:0;">
        <a href="hapussales.php?id=<?= $row["id"];	
    ?>&username=<?= $username?> onclick="return confirm('yakin akan menghapus?')">hapus</a>
    </td>
    <td><?= $row["nama"];	?></td>
    <td><?= $row["email"];	?></td>
    <td><?= $row["nomorhp"];	?></td>
    <td><?= $row["perusahaan"];	?></td>
    <td><?= $row["tanggallahir"];	?></td>
    <td><?= $row["jeniskelamin"];	?></td>
    <td><?= $row["alamat"];	?></td>
</tr>
<?php $i++?>
<?php	endforeach; ?>
</table>
<br>
</div>

<!-- navigasi jumlah halaman -->


</body>
</html>