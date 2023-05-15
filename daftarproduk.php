<?php	
require'..\ppl\config\functions.php';
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];

if ($tabel==='sales'):
$produksales = query("SELECT * FROM produk WHERE username='$username'");
endif;
if ($tabel==='petani'):
$produksales = query("SELECT * FROM produk ORDER BY id_produk");
$wishlist = query("SELECT * FROM wishlistpetani ORDER BY id_wishlist");
endif;
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
                        
                        <a href="index<?= $tabel;?>.php"class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="halamanutama<?= $tabel;?>.php">Kembali</a></li> 
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
                        <div class="section-heading" style="margin-bottom: 40px;">
                            <h2>katalog Produk</h2>
                            <?php	if ($tabel==='sales'):?>
                                <div style="margin-top:30px;"><h4 style="color:black;"><a style="font-style: unset;color:black;" 
                                href="tambahproduk.php">Tambahkan Produk</a></h4></div>
                                <?php	endif;?>

                        </div>
                       
            </div>
        </div>

</section>
    <div style="margin:80px;margin-top:0px; overflow-x:auto;justify-content:center;display:flex;">



<br>
<br>
<br>
<?php	if ($tabel==='sales'):?>
<table border="1" cellpadding="10" cellspacing="0" style="width:500px;">
<tr>
<!-- kop tabel-->
<th>No.</th>
<th>Aksi</th>
<th>Nama Produk</th>
<th>gambar</th>
<th>deskripsi</th>
<th>Jumlah Stok</th>
<th>wishtlist</th>
<th>username</th>

</tr>
<?php $i=1?><!--  nomor urut -->
<?php foreach($produksales as $row) :?>
<tr>
<td><?= $i?></td>
<td >
    <?php	if ($tabel==='sales'):?>
        <a href="ubahproduk.php?id=<?= $row["id_produk"];	
    ?>">ubah</a> |
    <a href="hapusproduk.php?id=<?= $row["id_produk"];	
    ?>" onclick="return confirm('yakin akan menghapus?')">hapus</a>                     
    <?php	endif;?>
    <a href="produk.php?id=<?= $row["id_produk"];	
    ?>">lihat</a> 
</td>
<td><?= $row["nama_produk"];	?></td>
<td><img style="width: 100%;float: left;padding: 20px;
" src="produk/gambar/<?= $row["gambar"];?>" alt=""></td>

<td><?= $row["deskripsi"];	?></td>
<td><?= $row["jumlah_stok"];	?></td>
<td><?= $row["wishlist"];	?></td>
<td><?= $row["username"];	?></td>
</tr>
<?php $i++?>
<?php	endforeach; ?>
</table>

<?php	else:?>

<section class="product" > 

        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">
            
        <?php $b=1?>
            <?php foreach($produksales as $row) :?>
            
            <?php foreach($petani as $row2) :?>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">Produk <?php echo$b;?></span>
                    <img src="produk/gambar/<?= $row["gambar"];?>" class="product-thumb" alt="">
   
                    <button class="card-btn" onclick="window.location.href='produk.php?id=<?= $row['id_produk'];?>'">lihat</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand"><?= $row["nama_produk"];	?></h2>
                    <p class="product-short-description"><?= $row["deskripsi"];	?></p>
                </div>
            </div>
            <?php $b++?>
            <?php	endforeach; ?>
            <?php	endforeach; ?>


             
            </div>
            
        </div>
    </section>
<!-- wishlist -->
    <section class="product" > 

<button class="pre-btn"><img src="images/arrow.png" alt=""></button>
<button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
<div class="product-container">
    
<?php $b=1?>
    <?php foreach($wishlist as $row3) :?>
    
    <?php foreach($petani as $row4) :?>
    <?php	
        $idproduk=$row3['id_produk'];
        $produkwishlist = query("SELECT * FROM produk WHERE id_Produk='$idproduk'")[0];
        ?>  
    <div class="product-card">
        <div class="product-image">
            <span class="discount-tag">wishlist <?php echo$b;?></span>
            <img src="produk/gambar/<?= $produkwishlist["gambar"];?>" class="product-thumb" alt="">            
        </div>
        <div class="product-info">
            <h2 class="product-brand"><?= $produkwishlist["nama_produk"];	?></h2>
            <p class="product-short-description"><?= $produkwishlist["deskripsi"];	?></p>
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
