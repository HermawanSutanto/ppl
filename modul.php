<?php	
require'functions.php';

$tabel=$_GET["tabel"];
$username = $_GET["username"];

$modul = query("SELECT * FROM modul ORDER BY id ");
$petani = query("SELECT * FROM petani WHERE username='$username'");


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

    <title>Klassy Cafe - Restaurant HTML Template</title>

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
                        
                        <a href="index<?= $tabel;?>.php?username=<?= $username;?>"class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="index<?= $tabel;?>.php?username=<?= $username;?>">Kembali</a></li> 
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
<section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h2>Daftar Modul</h2>
                            <?php	if ($tabel==='admin1'):?>
                                <div style="margin-top:30px;"><h4 style="color:black;"><a style="font-style: unset;color:black;" 
                                href="tambahmodul.php?username=<?= $username;?>&tabel=<?= $tabel;?>">Tambahkan Modul</a></h4></div>
                                <?php	endif;?>

                        </div>
                       
            </div>
        </div>

</section>
    <div style="margin:80px;margin-top:0px; overflow-x:auto;">



<br>
<br>
<br>
<?php	if ($tabel==='admin1'):?>
<table border="1" cellpadding="10" cellspacing="0" style="width:500px;">
<tr>
<!-- kop tabel-->
<th>No.</th>
<th>Aksi</th>
<th>judul</th>
<th>deskripsi</th>
<th>gambarsampul</th>
<th>video</th>
<th>narasumber</th>

</tr>
<?php $i=1?><!--  nomor urut -->
<?php foreach($modul as $row) :?>
<tr>
<td><?= $i?></td>
<td >
    <?php	if ($tabel==='admin1'):?>
        <a href="ubahmodul.php?id=<?= $row["id"];	
    ?>&username=<?= $username;?>&tabel=<?= $tabel;?>">ubah</a> |
    <a href="hapusmodul.php?id=<?= $row["id"];	
    ?>&username=<?= $username;?>&tabel=<?= $tabel;?>" onclick="return confirm('yakin akan menghapus?')">hapus</a>                     
    <?php	endif;?>

    <a href="modulsatuan.php?id=<?= $row["id"];	
    ?>&username=<?= $username;?>&tabel=<?= $tabel;?>">lihat</a> 
</td>
<td><?= $row["judul"];	?></td>
<td><?= $row["deskripsi"];	?></td>
<td><img style="width: 100%;float: left;padding: 20px;
" src="modul/sampul/<?= $row["gambarsampul"];?>" alt=""></td>

<td ><iframe class="fa fa-play" src="<?= $row["video"];?>" style=" float: left;padding: 20px;" 
frameborder="0" width="400px" height="225px"
></iframe></td>
<td><?= $row["narasumber"];	?></td>

</tr>
<?php $i++?>
<?php	endforeach; ?>
</table>

<?php	else:?>

<section class="product" "> 

        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">
            
        <?php $b=1?>
            <?php foreach($modul as $row) :?>
            
            <?php foreach($petani as $row2) :?>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">Modul <?php echo$b;?></span>
                    <img src="modul/sampul/<?= $row["gambarsampul"];?>" class="product-thumb" alt="">
                    <?php	if ($row2['status']==='aktif'):?>
                    <button class="card-btn" onclick="window.location.href='modulsatuan.php?id=<?= $row["id"];?>&username=<?= $username;?>&tabel=<?= $tabel;?>'">lihat</button>
                    <?php else:?>
                    <button type="lihat" name="lihat" class="card-btn" onclick="alert('Maaf anda belum berlangganan')" >lihat</button>
                    <?php endif;?>
                    
                </div>
                <div class="product-info">
                    <h2 class="product-brand"><?= $row["judul"];	?></h2>
                    <p class="product-short-description"><?= $row["deskripsi"];	?></p>
                </div>
            </div>
            <?php $b++?>
            <?php	endforeach; ?>
            <?php	endforeach; ?>


             
            </div>
            
        </div>
    </section>

<?php	endif;?>

</div>  

</body>
<script src="modul/script.js"></script>

</html>
