<?php
require '..\ppl\config\functions.php';
session_start();
// cek session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
$username = $_SESSION["username"];
$tabel = $_SESSION["tabel"];

if ($tabel === 'sales') :
    $produksales = query("SELECT * FROM produk WHERE username='$username'");
endif;
if ($tabel === 'admin') :
    $produksales = query("SELECT * FROM produk ");
endif;


if ($tabel === 'petani') :
    $petani = query("SELECT * FROM petani WHERE username='$username'");
    $id_petani = $petani[0]['id'];
    $produksales = query("SELECT * FROM produk ORDER BY id_produk");
    $wishlist = query("SELECT * FROM wishlistpetani  WHERE id_petani='$id_petani'ORDER BY id_wishlist");
endif;



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="tab.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="halamanproduk.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="modul/style.css">
    <title>Katalog Produk</title>
</head>

<header class="header-area header-sticky" style="position:sticky;">
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

<body>
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading" style="margin-bottom: 40px;">
                            <?php if ($tabel === 'sales') : ?>
                                <button class="btn btn-primary btn-sm" style="margin-bottom:10px;width:content-fit;background-color:#E3B04B;border-color:#E3B04B;">
                                    <h5 style="color:black;"><a style="font-style: unset;color:white;" href="tambahproduk.php">Tambahkan Produk</a></h5>
                                </button>
                                <div style="margin-top:30px;">

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if ($tabel === 'sales' | $tabel === 'admin') : ?>
        <div>
            <h2 style="margin-left:400px;">Katalog Produk</h2>
            <?php $i = 1 ?><!--  nomor urut -->
            <?php foreach ($produksales as $row) : ?>
                <?php $username = $row["username"];
                $namasales = query("SELECT nama FROM sales WHERE username='$username'")[0];
                ?>

                <?php $i++ ?>
                <div class="container mt-5 mb-5">

                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            <div class="row p-2 bg-white border rounded">
                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="produk/gambar/<?= $row["gambar"]; ?>" style="object-fit:cover;"></div>
                                <div class="col-md-6 mt-1">
                                    <h5><?= $row["nama_produk"]; ?></h5>
                                    <div class="d-flex flex-row">
                                        <div class="ratings mr-2"><i class="fa fa-archive"> stok:</i></div><span><?= $row["jumlah_stok"]; ?></span>
                                    </div>
                                    <div class="mt-1 mb-1 spec-1"><span><?= $row["deskripsi"];    ?></span></div>
                                    <div class="mt-1 mb-1 spec-1"><span>jumlah wishlist : <?= $row["wishlist"];    ?></span></div>
                                    <p class="text-justify text-truncate para mb-0">Produk dari : <?= $namasales['nama'];  ?><br><br></p>
                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="mr-1"></h4>
                                    </div>
                                    <div class="d-flex flex-column mt-4">

                                        <?php if ($tabel === 'sales') : ?>
                                            <button class="btn btn-primary btn-sm" type="button" style="margin-bottom:10px;width:100%;background-color:#E3B04B;border-color:#E3B04B;" onclick="location.href='ubahproduk.php?id=<?= $row["id_produk"];
                                                                                                                                                                                                                                ?>'"><a href="ubahproduk.php?id=<?= $row["id_produk"];
                                                                                                                                                                                                                                                                ?>" style="color:white;">ubah</a></button>
                                            <button class="btn btn-primary btn-sm" type="button" style="margin-bottom:10px;width:100%;background-color:#E3B04B;border-color:#E3B04B;" onclick="return confirm('yakin akan menghapus?'),location.href='hapusproduk.php?id=<?= $row["id_produk"];
                                                                                                                                                                                                                                                                            ?>'"> <a href="hapusproduk.php?id=<?= $row["id_produk"];
                                                                                                                                                                                                                                                                                                                ?>" style="color:white;">hapus</a></button>
                                        <?php endif; ?>
                                        <button class="btn btn-primary btn-sm" type="button" style="width:100%;background-color:#E3B04B;border-color:#E3B04B;" onclick="location.href='produk.php?id=<?= $row["id_produk"];
                                                                                                                                                                                                        ?>'"> <a href="produk.php?id=<?= $row["id_produk"];
                                                                                                                                                                                                                                        ?>" style="color:white;">lihat</a> </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else : ?>

        <section class="produkpetani" style="width:auto; display:flex; justify-content:center;">

            <!-- product -->
            <div class="tabs">
                <input type="radio" class="tabs__radio" name="tabs-example" id="tab1" checked>
                <label for="tab1" class="tabs__label">Katalog Produk</label>
                <div class="tabs__content">
                    <h2 style="margin-left:100px;">Katalog Produk</h2>
                    <section class="product">
                        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
                        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
                        <div class="product-container">
                            <?php $b = 1 ?>
                            <?php foreach ($produksales as $row) : ?>

                                <?php foreach ($petani as $row2) : ?>
                                    <div class="product-card">
                                        <div class="product-image">
                                            <span class="discount-tag">Produk <?php echo $b; ?></span>
                                            <img src="produk/gambar/<?= $row["gambar"]; ?>" class="product-thumb" alt="">
                                            <button class="card-btn" style="width:100%;background-color:#E3B04B;border-color:#E3B04B;" onclick="window.location.href='produk.php?id=<?= $row['id_produk']; ?>'">lihat</button>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-brand" style="font-size:20px;font-weight:500;"><?= $row["nama_produk"];    ?></h2>
                                            <p class="product-short-description"><?= $row["deskripsi"];    ?></p>
                                            <span class="price"></span><span class="actual-price"></span>
                                        </div>
                                    </div>
                                    <?php $b++ ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </section>

                </div>
                <input type="radio" class="tabs__radio" name="tabs-example" id="tab2">
                <label for="tab2" class="tabs__label">Wishlist</label>
                <div class="tabs__content">
                    <h2 style="margin-left:100px;margin-bottom:80px;">Daftar Wishlist</h2>
                    <section class="wishlist" style="justify-content:center;width:1200px; margin:auto;display: flex;flex-wrap: wrap;">
                        <?php $b = 1 ?>
                        <?php foreach ($wishlist as $row3) : ?>
                            <?php foreach ($petani as $row4) : ?>
                                <?php
                                $idproduk = $row3['id_produk'];
                                $produkwishlist = query("SELECT * FROM produk WHERE id_Produk='$idproduk'")[0];
                                ?>
                                <div style="width:250px;margin-left:20px;margin-right:20px;margin-bottom:20px;justify-content:center;border: 1px solid whitesmoke;">
                                    <div style="width:250px;height:160px;background-color:white; padding:10px;object-fit:cover;"><img class="img-fluid img-responsive rounded product-image" src="produk/gambar/<?= $produkwishlist["gambar"]; ?>" style="object-fit:cover;width:250px;height:150px;border-radius:20px;"></div>
                                    <div style="width:250px;height:160px;background-color:white; padding:10px;">
                                        <h5 style="text-align:center;"><?= $produkwishlist["nama_produk"];    ?></h5>
                                        <div style="height:100px;">
                                            <p style=" white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow: ellipsis;">
                                                <?= $produkwishlist["deskripsi"]; ?></p>
                                        </div>
                                    </div>
                                    <div style="display:flex;align-items:flex-start;padding:20px;">
                                        <button class="btn btn-primary btn-sm" style="width:80px;background-color:#E3B04B;border-color:#E3B04B;" type="button" onclick="location.href='produk.php?id=<?= $row3["id_produk"];
                                                                                                                                                                                                        ?>'"> <a href="produk.php?id=<?= $row3["id_produk"];
                                                                                                                                                                                                                                        ?>" style="color:white;">lihat</a> </button>

                                    </div>

                                </div>
                            <?php endforeach; ?>

                        <?php endforeach; ?>
                    </section>




                <?php endif; ?>

                </div>



                <script src="script.js"></script>
</body>

</html>