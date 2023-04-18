<?php	
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}

// koneksi ke dbms
require'functions.php';

// ambil data di url
$id=$_GET["id"];
// querry data admin berdasar id
$adm =query("SELECT * FROM petani WHERE id = $id")[0];
$username = $adm['username'];
// var_dump($adm["nomorhp"]);


// cek apakah submit telah ditekan
if(isset($_POST["submit"])){

// cek apakah data berhasil ditambahkan atau tidak llalu kembali ke halaman akun
    // var_dump(mysqli_affected_rows($conn));
    if (ubahpetani($_POST)>0){
        echo" <script>
            alert('data berhasil diubah!');
            document.location.href = 'akun.php?username=$username'
        </script>
        ";

    }else{
        echo" <script>
        alert('data gagal diubah!');
        document.location.href = 'akun.php?username=$username'
        </script>
        ";
    }

}

?>
<<!DOCTYPE html>
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
                         
                        
                           	
                       
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="akun.php?username=<?= $username;?>&tabel=petani">Kembali</a></li> 
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

    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>Data Diri</h2>
                            <div class="tabellogin">
    <h1>Ubah data Sales</h1>
    <div class="tabellogin">
    <h1>Ubah data Petani</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $adm["id"];?>">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username"required 
                value="<?=$adm["username"]?>">

            </li>
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" required
                value="<?=$adm["nama"]?>">

            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email"required
                value="<?=$adm["email"]?>">
            </li>

            <li>
                <label for="nomorhp">Nomor Handphone : </label>
                <input type="text" name="nomorhp" id="nomorhp"required
                value="<?=$adm["nomorhp"]?>">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password"required
               >
            </li>
            <li>
                <label for="password2">konfirmasi Password : </label>
                <input type="password2" name="password2" id="password2"required
               >
            </li>
            <li>
                <label for="alamat">Alamat : </label>
                <input type="text" name="alamat" id="alamat"
                value="<?=$adm["alamat"]?>">
            </li>
            <!-- <li>
                <label for="jeniskelamin">Jenis Kelamin : </label>
                <input type="text" name="jeniskelamin" id="jeniskelamin">
            </li> -->
            <li>
                <label for="jeniskelamin">Jenis Kelamin :</label>
                <select name="jeniskelamin" id="jeniskelamin"required autocomplete="on">
                        <option value="<?=$adm["jeniskelamin"]?>"><?=$adm["jeniskelamin"]?></option>
                        <option value="Laki laki">Laki laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>


    </form>
    <a href="datapetani.php">kembali ke halaman data petani</a>
    </div>
</body>
</html>