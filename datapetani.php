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
$jumlahdata = count(query("SELECT * FROM petani"));//jumlah seluruh data
$jumlahhalaman = ceil($jumlahdata/$jumlahadataperhalaman);//hasil diulatkan keatas
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ; //ternari,

//halaman =2,awaldata =2
//halaman =3, awawldata=4
//menentukan data pertama di tiap halaman
$awaldata = ($jumlahadataperhalaman*$halamanaktif)-$jumlahadataperhalaman;

$petani = query("SELECT * FROM petani ORDER BY id DESC LIMIT $awaldata,$jumlahadataperhalaman");//ASC urut id membesar, DESC mengecil,

//limit membuat batasan data  yang ditampilkan index ke berapa,berapa data
//  ambil data dari database tabel admin1 / query

// tombol cari di klik
if(isset( $_POST["cari"])){
    $petani = caripetani($_POST["keyword"]);
    
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman petani</title>
    <link rel="stylesheet" href="styleindex.css">

<style>
    
</style>
</head>

<body>
    <a href="logout.php">Logout</a>
<h1>Daftar Petani</h1>
<a href="indexadmin1.php?username=<?= $username;?>">Kembali</a>
<br><br>
<br><br>
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
<br>
<!-- navigasi jumlah halaman -->
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
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <!-- kop tabel-->
        <th>No.</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>Email</th>
        <th>NomorHp</th>
        <th>status</th>
        <th>JenisKelamin</th>
        <th>Alamat</th>
    </tr>
    <?php $i=1?><!--  nomor urut -->
    <?php foreach($petani as $row) :?>
    <tr>
        <td><?= $i?></td>
        <td style="width:150px;">
            <a href="ubahpetani.php?id=<?= $row["id"];	
            ?>">ubah</a> |
            <a href="hapuspetani.php?id=<?= $row["id"];	
            ?>" onclick="return confirm('yakin akan menghapus?')">hapus</a>
        </td>
        <td><?= $row["nama"];	?></td>
        <td><?= $row["email"];	?></td>
        <td><?= $row["nomorhp"];	?></td>
        <td><?= $row["status"];	?></td>
        <td><?= $row["jeniskelamin"];	?></td>
        <td><?= $row["alamat"];	?></td>
    </tr>
    <?php $i++?>
    <?php	endforeach; ?>
</table>
<br>


</body>
</html>