<?php	
require'..\ppl\config\functions.php';

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];
// koneksi ke dbms


// ambil data di url
$id=$_GET["id"];
// querry data modul berdasar id
$adm = query("SELECT * FROM modul WHERE id = $id")[0];
// var_dump($adm["nomorhp"]);


// cek apakah submit telah ditekan
if(isset($_POST["ubah"])){

// cek apakah data berhasil ditambahkan atau tidak
    // var_dump(mysqli_affected_rows($conn));
    if (ubahmodul($_POST)>0){
        echo" <script>
            alert('modul berhasil diubah!');
            document.location.href = 'modul.php'
        </script>
        ";

    }else{
        echo" <script>
        alert('modul gagal diubah!');
        document.location.href = 'modul.php'
        </script>
        ";
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Data Sales</title>
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
                        
                        <a href="index<?= $tabel;?>.php"class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                         
                        
                           	
                       
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="modul.php">Kembali</a></li> 
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
<div class="tabelmodul" style="margin:160px;">
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$adm["id"];?>">
<input type="hidden" name="gambarlama" value="<?=$adm["gambarsampul"];?>">
<input type="hidden" name="modullama" value="<?=$adm["modul"];?>">
    <ul>
            <li>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul"required value="<?=$adm["judul"];?>">

            </li>
            <li>
                <label for="deskripsi">Deskripsi : </label>
                <input type="text" name="deskripsi" id="deskripsi" required value="<?=$adm["deskripsi"];?>">

            </li>
            <li>
                <label for="gambarsampul">Gambar Sampul : </label><br>
                <img src="modul/sampul/<?=$adm["gambarsampul"];?>" alt="" width="90"><br>
                <input type="file" name="gambarsampul" id="gambarsampul" >
            </li>
            <li>
                <label for="video">Link video : </label>
                <input type="text" name="video" id="video"required value="<?=$adm["video"];?>">
            </li>
            <li>
                <label for="narasumber">Narasumber: </label>
                <input type="text" name="narasumber" id="narasumber"required value="<?=$adm["narasumber"];?>">
            </li>
            <li>
                <label for="modul">Modul: </label>
                <input type="file" name="modul" id="modul">
            </li>
            
        <button type="submit" name="ubah">Ubah Modul</button>



    </ul>

</form>
</div>


</body>
</html>