<?php	
require'..\ppl\config\functions.php';

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}

// koneksi ke dbms

// ambil data di url
$id=$_GET["id"];
$usernameadm=$_SESSION["username"];
// querry data admin berdasar id
$adm =query("SELECT * FROM petani WHERE id = $id")[0];
$username = $adm['username'];
// var_dump($adm["nomorhp"]);


// cek apakah submit telah ditekan
if(isset($_POST["submit"])){

// cek apakah data berhasil ditambahkan atau tidak llalu kembali ke halaman akun
    // var_dump(mysqli_affected_rows($conn));
    if (ubahstatuspetani($_POST)>0){
        echo" <script>
            alert('data berhasil diubah!');
            document.location.href = 'datapetani.php'
        </script>
        ";

    }else{
        echo" <script>
        alert('data gagal diubah!');
        document.location.href = 'datapetani.php'
        </script>
        ";
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Ubah Status</title>
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
                        
                        <a href="index<?= $tabel;?>.php?username=<?= $username;?>"class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                         
                        
                           	
                       
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"> <a href="datapetani.php">Kembali</a></li> 
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
<body> 

<section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="tabelmodul">
    <h1>Ubah Status <?=$adm["nama"]?></h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $adm["id"];?>">
        <ul>

            <li>
                <label for="status">Status Membership :</label>
                <select name="status" id="status"required autocomplete="on">
                        <option value="<?=$adm["status"]?>"><?=$adm["status"]?></option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </li>
            <!-- <li>
                <label for="jeniskelamin">Jenis Kelamin : </label>
                <input type="text" name="jeniskelamin" id="jeniskelamin">
            </li> -->

            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>


    </form>
    </div>
    
                       
            </div>
        </div>

</section>
 
</body>
</html>