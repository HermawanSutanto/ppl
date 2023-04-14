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
    <title>Registrasi</title>
    <link rel="stylesheet" href="stylelogin.css">
<style>
</style>
</head>

<body> 
<div class="tabelmodul">
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
                <label for="gambarsampul">gambarsampul : </label><br>
                <img src="modul/sampul/<?=$adm["gambarsampul"];?>" alt="" width="90"><br>
                <input type="file" name="gambarsampul" id="gambarsampul" >
            </li>
            <li>
                <label for="video">Link video : </label>
                <input type="text" name="video" id="video"required value="<?=$adm["video"];?>">
            </li>
            <li>
                <label for="narasumber">narasumber : </label>
                <input type="text" name="narasumber" id="narasumber"required value="<?=$adm["narasumber"];?>">
            </li>
            <li>
                <label for="modul">Modul: </label>
                <input type="file" name="modul" id="modul">
            </li>
            
        <button type="submit" name="ubah">Ubah Modul</button>

        <a href="loginpetani.php">Kembali</a>

    </ul>

</form>
</div>


</body>
</html>