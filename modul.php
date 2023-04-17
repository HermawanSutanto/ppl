

<?php	
require'functions.php';
if(isset($_POST["tambah"])){

    if (tambahmodul($_POST)>0){
        echo "<script>
        alert('modul baru berhasil ditambahkan!');
        </script>";
    }else{
        echo "<script>
        alert('modul gagal ditambahkan!');
        </script>";
        echo mysqli_error($conn);

    }
    // var_dump($_POST);
    // var_dump($_FILES);
}


$modul = query("SELECT * FROM modul ORDER BY id ")
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
</style>
</head>
<body> 

<table border="1" cellpadding="10" cellspacing="0">
<tr>
<!-- kop tabel-->
<th>No.</th>
<th>Aksi</th>
<th>judul</th>
<th>deskripsi</th>
<th>gambarsampul</th>
<th>video</th>
<th>narasumber</th>
<th>modul</th>
</tr>
<?php $i=1?><!--  nomor urut -->
<?php foreach($modul as $row) :?>
<tr>
<td><?= $i?></td>
<td style="width:150px;">
    <a href="ubahmodul.php?id=<?= $row["id"];	
    ?>">ubah</a> |
    <a href="hapusmodul.php?id=<?= $row["id"];	
    ?>" onclick="return confirm('yakin akan menghapus?')">hapus</a>
     <a href="modulsatuan.php?id=<?= $row["id"];	
    ?>">lihat</a> 
</td>
<td><?= $row["judul"];	?></td>
<td><?= $row["deskripsi"];	?></td>
<td><?= $row["gambarsampul"];	?></td>
<td><?= $row["video"];	?></td>
<td><?= $row["narasumber"];	?></td>
<td><?= $row["modul"];	?></td>
</tr>
<?php $i++?>
<?php	endforeach; ?>
</table></div>




<div class="tabelmodul">
<form action="" method="post" enctype="multipart/form-data">
    <ul>
            <li>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul"required>

            </li>
            <li>
                <label for="deskripsi">Deskripsi : </label>
                <input type="text" name="deskripsi" id="deskripsi" required>

            </li>
            <li>
                <label for="gambarsampul">gambarsampul : </label>
                <input type="file" name="gambarsampul" id="gambarsampul">
            </li>
            <li>
                <label for="video">Link video : </label>
                <input type="text" name="video" id="video"required>
            </li>
            <li>
                <label for="narasumber">narasumber : </label>
                <input type="text" name="narasumber" id="narasumber"required>
            </li>
            <li>
                <label for="modul">Link Modul: </label>
                <input type="file" name="modul" id="modul">
            </li>
            
        <button type="submit" name="tambah">Tambah Modul</button>

        <a href="indexadmin1.php">Kembali</a>

    </ul>

</form>
</div>



</body>
</html>