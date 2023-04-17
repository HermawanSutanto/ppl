<?php
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}

require'functions.php';
$username=$_GET["username"];
$tabel="";
$aktor=akun($username);

$result = mysqli_query($conn,"SELECT username FROM 
admin1 WHERE username = '$username'");
if (mysqli_fetch_assoc($result)){
    
    $tabel="admin1";

}
$result = mysqli_query($conn,"SELECT username FROM 
sales WHERE username = '$username'");
if (mysqli_fetch_assoc($result)){
    
    $tabel="sales";
}
$result = mysqli_query($conn,"SELECT username FROM 
petani WHERE username = '$username'");
if (mysqli_fetch_assoc($result)){
    
    $tabel="petani";
    
}

$tabel1 = query("SELECT * FROM $tabel WHERE username='$username'");

?>

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

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

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
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index<?= $tabel;?>.php?username=<?= $username;?>" class="">Halaman <?= $tabel;?></a></li>
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
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
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
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
                            <li class="scroll-to-section"><a href="index<?= $tabel;?>.php?username=<?= $username;?>">Akun</a></li> 
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

<!-- navigasi jumlah halaman -->
<section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>Data Diri</h2>

                        </div>
                        <div><ul>
                            <?php foreach($tabel1 as $row) :?>
                            <?php foreach($row as $satuan) :?>
                                <!-- memeriksa apakah key berupa id/password -->
                                <?php	if(array_search($satuan, $row)=="password"| array_search($satuan, $row)=="id"):?>
                                    <?php	else:?>
                                        <li><?php echo array_search($satuan, $row);?> :  <?= $satuan;?></li>
                                    <?php	endif;?>
                                <?php	endforeach;?>
                            <?php	endforeach;?>
                            </ul>
                            <a href="ubah<?=$tabel;?>.php?id=<?= $row["id"];	
                                ?>">ubah</a></div>
                            <!-- <a href="hapus<?=$tabel;?>.php?id=<?= $row["id"];	
                                ?>">hapus</a></div> -->
                        <div class="row">
                            <div class="col-4">
                                <img src="assets/images/about-thumb-01.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/about-thumb-02.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/about-thumb-03.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                            <img src="assets/images/about-video-bg.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div>

</div>
     
   


<br>


</body>
</html>