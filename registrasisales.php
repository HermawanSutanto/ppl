<?php	
require'functions.php';


if(isset($_POST["register"])){

    if (registrasisales($_POST)>0){
        echo "<script>
        alert('user baru berhasil ditambahkan!');
        </script>";
    }else{
        echo mysqli_error($conn);

    }

}
$username=$_GET["username"]

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="stylelogin.css">

    <style>
       
    </style>
</head>
<body> 
<h1>Halaman Registrasi sales</h1>
<div class="tabellogin">
<form action="" method="post">
    <ul>
    <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username"required>

            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>

            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email"required>
            </li>
            <li>
                <label for="perusahaan">Perusahaan : </label>
                <input type="text" name="perusahaan" id="perusahaan"required>
            </li>
            <li>
                <label for="tanggallahir">Tanggal lahir : </label>
                <input type="text" name="tanggallahir" id="tanggallahir"required>
            </li>
            <li>
                <label for="nomorhp">Nomor Handphone : </label>
                <input type="text" name="nomorhp" id="nomorhp"required>
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password"required>
            </li>
            <li>
                <label for="password2">Konfirmasi Password : </label>
                <input type="password2" name="password2" id="password"required>
            </li>
            <li>
                <label for="alamat">Alamat : </label>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li>
                <label for="jeniskelamin">Jenis Kelamin :</label>
                <select name="jeniskelamin" id="jeniskelamin"required>
                        <option value="">pilih Jenis Kelamin</option><option value="Laki laki">Laki laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
            </li>
            
        <button type="submit" name="register">Register</button>

        <a href="datasales.php?username=<?=$username?>">Kembali</a>

    </ul>

</form>
</div>

</body>
</html>