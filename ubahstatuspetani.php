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
$usernameadm=$_GET["username"];
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
            document.location.href = 'datapetani.php?username=$usernameadm'
        </script>
        ";

    }else{
        echo" <script>
        alert('data gagal diubah!');
        document.location.href = 'datapetani.php?username=$usernameadm'
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
    <a href="datapetani.php?username=<?= $usernameadm;?>">kembali</a>
    </div>
</body>
</html>