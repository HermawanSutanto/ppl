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
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="stylelogin.css">
<style>
</style>
</head>
<body> 
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