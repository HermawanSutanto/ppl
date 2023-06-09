<?php
require '..\ppl\config\functions.php';
session_start();
// cek session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
$username = $_SESSION["username"];
$tabel = $_SESSION["tabel"];


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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
        <section class="section" id="about" style="padding:0%;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="left-text-content">
                            <div class="section-heading" style="margin-bottom: 40px;">
                                <h2>Daftar Modul</h2>
                                <?php if ($tabel === 'admin') : ?>
                                    <div class="btn btn-primary btn-sm" style="margin-top:30px;background-color:#E3B04B;border-color:#E3B04B;">
                                        <h4 style="color:black;"><a style="font-style: unset;color:white;" href="tambahmodul.php">Tambahkan Modul</a></h4>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>

        </section>
        <div style="margin:80px;margin-top:0px; overflow-x:auto;justify-content:center;display:flex;">
            <br>
            <br>
            <br>
            <?php if ($tabel === 'admin') : ?>
                <div style="display:block;">
                    <?php $i = 1 ?><!--  nomor urut -->
                    <?php foreach ($modul as $row) : ?>
                        <?php
                        $id_admin = $row["id_admin"];
                        $admin2 = mysqli_query($conn, "SELECT * FROM admin WHERE id='$id_admin'");
                        $admin = mysqli_fetch_assoc($admin2);
                        $nama_admin = $admin['nama'];
                        ?>
                        <div style="display:flex;width:1000px;margin-left:20px;margin-right:20px;margin-bottom:20px;justify-content:center;border: 2px solid whitesmoke;">
                            <div style="width:120px;margin-left:0 ; padding:10px;object-fit:cover;">
                                <img class="img-fluid img-responsive rounded product-image" src="modul/sampul/<?= $row["gambarsampul"]; ?>" style="object-fit:cover;width:100px;height:150px;border-radius:20px;">
                            </div>
                            <div style="width:600px;padding:10px;">
                                <div style="display: flex;">
                                    <div style="width:500px;">
                                        <h5 style="text-align:left;font-size:20px;"><?= $row["judul"];    ?></h5>
                                    </div>
                                    <div style=" margin:auto;margin-right:0;width:82px;margin-top:0;">
                                        <a href="ubahmodul.php?id=<?= $row["id"]; ?>">
                                            <div class="material-icons" style="color:gray;">edit</div>
                                        </a>
                                        <a href="hapusmodul.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin akan menghapus?')">
                                            <div class="material-icons" style="color:gray;">delete</div>
                                        </a>
                                        <a href="modul.php?id=<?= $row["id"]; ?>">
                                            <div class="material-icons" style="color:gray;">file_open</div>
                                        </a>

                                    </div>
                                </div>
                                <div>
                                    <p style=" white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        Deskripsi : <?= $row["deskripsi"];    ?></p>
                                </div>
                                <div>
                                    <p style=" white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        Narasumber : <?= $row["narasumber"];    ?></p>
                                </div>
                                <div>
                                    <p style=" white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        Pengupload : <?= $nama_admin;    ?></p>
                                </div>
                            </div>
                            <div style="width:250px;background-color:white;margin-left:0 ; padding:10px;object-fit:cover;">
                                <iframe class="fa fa-play" src="<?= $row["video"]; ?>" style="object-fit:cover;width:250px;height:150px;border-radius:20px;padding-right:10px;" frameborder="0" width="250px" height="150px"></iframe>

                            </div>
                        </div>


                        <?php $i++ ?>
                    <?php endforeach; ?>
                </div>
                <!-- <div style="display:flex ;">
                        <div style=" outline: 1px solid red;">judul</div>
                        <div style="width:100px;">
                            <div class="cover" style="width: 100px; height: 50px; outline: 1px solid red;">sampul</div>
                            <div class="video" style="width: 100px; height: 50px; outline: 1px solid red;">video</div>
                        </div>
                        <div class="description" style="order: 3; outline: 1px solid red;">deskripsi</div>
                        <div class="speaker" style="order: 4; outline: 1px solid red;">narasumber</div>
                        <div class="uploader" style="order: 5; outline: 1px solid red;">pengupload</div>
                    </div> -->




            <?php else : ?>

                <section class="product" "> 

        <button class=" pre-btn"><img src="images/arrow.png" alt=""></button>
                    <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
                    <div class="product-container">

                        <?php $b = 1 ?>
                        <?php foreach ($modul as $row) : ?>

                            <?php foreach ($petani as $row2) : ?>
                                <div class="product-card">
                                    <div class="product-image">
                                        <span class="discount-tag">Modul <?php echo $b; ?></span>
                                        <img src="modul/sampul/<?= $row["gambarsampul"]; ?>" class="product-thumb" alt="">
                                        <?php if ($row2['status'] === 'aktif') : ?>
                                            <button class="card-btn" onclick="window.location.href='modul.php?id=<?= $row['id']; ?>'">lihat</button>
                                        <?php else : ?>
                                            <button type="lihat" name="lihat" class="card-btn" onclick="alert('Maaf anda belum berlangganan')">lihat</button>
                                        <?php endif; ?>

                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-brand" style="font-size:20px;font-weight:500;"><?= $row["judul"];    ?></h2>
                                        <p class="product-short-description"><?= $row["deskripsi"];    ?></p>
                                    </div>
                                </div>
                                <?php $b++ ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>



                    </div>

        </div>
        </section>

    <?php endif; ?>

    </div>

    </body>
    <script src="modul/script.js"></script>

</html>