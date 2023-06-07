<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "ppl");


function query($querry)
{
    global $conn;
    $result = mysqli_query($conn, $querry);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// function tambahsales($data){
//     // vmbil data dari tiap elemen form
//     global $conn;
//     // html special char agar kode html yang diinputkan tidak berjalan
//     // ndak wajib se, cuman buat keamanan
//     $nama = htmlspecialchars($data["nama"]);
//     $username = htmlspecialchars($data["username"]);
//     $perusahaan = htmlspecialchars($data["perusahaan"]);
//     $email = htmlspecialchars($data["email"]);
//     $tanggallahir = htmlspecialchars($data["tanggallahir"]);
//     $nomorhp = htmlspecialchars($data["nomorhp"]);
//     $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
//     $alamat = htmlspecialchars($data["alamat"]);
//     $password = htmlspecialchars($data["password"]);
//     $kabupaten = htmlspecialchars($data["kabupaten"]);


//     $password = password_hash($password,PASSWORD_DEFAULT);
//     $querry = "INSERT INTO sales
//     Values
//     ('','$nama','$username','$perusahaan','$email','$tanggallahir','$nomorhp',
//     '$jeniskelamin','$alamat','$password','$kabupaten')
//     ";
//     mysqli_query($conn,$querry);



//     // tambah user baru ke database
// }
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM admin WHERE id = $id ");
    return mysqli_affected_rows($conn);

    // $username = strtolower(stripslashes($data["username"]));
    // $result = mysqli_query($conn,"SELECT username FROM 
    // admin WHERE username = '$username'");
    // if (mysqli_fetch_assoc($result)){
    //     echo"<script>
    //     alert('username sudah terdaftar');
    //     </script>";
    //     return false;
    // }
    // $result = mysqli_query($conn,"SELECT username FROM 
    // sales WHERE username = '$username'");
    // if (mysqli_fetch_assoc($result)){
    //     echo"<script>
    //     alert('username sudah terdaftar');
    //     </script>";
    //     return false;
    // }
    // $result = mysqli_query($conn,"SELECT username FROM 
    // petani WHERE username = '$username'");
    // if (mysqli_fetch_assoc($result)){
    //     echo"<script>
    //     alert('username sudah terdaftar');
    //     </script>";
    //     return false;
    // }


}
function hapussales($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM sales WHERE id = $id ");
    return mysqli_affected_rows($conn);
}
function hapuspetani($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM petani WHERE id = $id ");
    return mysqli_affected_rows($conn);
}
function hapusmodul($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM modul WHERE id = $id ");
    return mysqli_affected_rows($conn);
}
function hapuspostingan($id)
{
    global $conn;
    //var_dump($id);
    mysqli_query($conn, "DELETE FROM postingan WHERE id = $id ");
    return mysqli_affected_rows($conn);
}
function hapuskomentar($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM komentar WHERE id_komentar = $id ");
    return mysqli_affected_rows($conn);
}
function hapusproduk($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id ");
    mysqli_query($conn, "DELETE FROM wishlistpetani WHERE id_produk = $id ");
    return mysqli_affected_rows($conn);
}
function hapuswishlist($id)
{
    global $conn;
    var_dump($id);

    $wishlist = mysqli_query($conn, "SELECT * FROM 
    wishlistpetani WHERE id_wishlist = '$id'");
    $wishlist = mysqli_fetch_assoc($wishlist);
    $id_produk = $wishlist['id_produk'];
    $jumlahwishlistsekarang = query("SELECT wishlist FROM 
    produk WHERE id_produk = '$id_produk' ");
    // var_dump($jumlahwishlistsekarang);
    $hasil = $jumlahwishlistsekarang[0]['wishlist'] - 1;


    $querry = "UPDATE produk SET 
    wishlist = '$hasil'
    WHERE id_produk = $id_produk";
    mysqli_query($conn, $querry);
    mysqli_query($conn, "DELETE FROM wishlistpetani WHERE id_wishlist = $id ");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $nomorhp = htmlspecialchars($data["nomorhp"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        if ($password !== $password2) {
            echo "<script>
            alert('Konfirmasi password tidak sesuai');
            </script>";
            return false;
        }
        $gambarsampullama = htmlspecialchars($data["gambarlama"]);

        // cek user memilih gambar baru apa nda
        if ($_FILES['fotoprofil']['error'] === 4) {
            $fotoprofil = $gambarsampullama;
        } else {
            $fotoprofil = uploadfoto();
        }
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $querry = "UPDATE admin SET 
        nama = '$nama',
        username ='$username',
        email = '$email',
        nomorhp = '$nomorhp',
        jeniskelamin = '$jeniskelamin',
        alamat = '$alamat',
        password ='$password',
        fotoprofil ='$fotoprofil',
        kabupaten ='$kabupaten'
        WHERE id = $id
    ";
        mysqli_query($conn, $querry);
        return mysqli_affected_rows($conn);
    } else {
        echo "<script>
      alert('email yang anda masukkan tidak valid');
      document.location.href = 'registrasipetani.php'
      </script>";
    }
}

function ubahsales($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $perusahaan = htmlspecialchars($data["perusahaan"]);
    $email = htmlspecialchars($data["email"]);
    $tanggallahir = htmlspecialchars($data["tanggallahir"]);
    $nomorhp = htmlspecialchars($data["nomorhp"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($password !== $password2) {
            echo "<script>
            alert('Konfirmasi password tidak sesuai');
            </script>";
            return false;
        }

        $gambarsampullama = htmlspecialchars($data["gambarlama"]);

        // cek user memilih gambar baru apa nda
        if ($_FILES['fotoprofil']['error'] === 4) {
            $fotoprofil = $gambarsampullama;
        } else {
            $fotoprofil = uploadfoto();
        }
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $querry = "UPDATE sales SET 
                        nama = '$nama',
                        username ='$username',
                        perusahaan ='$perusahaan',
                        email = '$email',
                        tanggallahir ='$tanggallahir',
                        nomorhp = '$nomorhp',
                        jeniskelamin = '$jeniskelamin',
                        alamat = '$alamat',
                        password ='$password',
                        fotoprofil = '$fotoprofil',
                        kabupaten = '$kabupaten'
                        WHERE id = $id
        ";

        mysqli_query($conn, $querry);
        return mysqli_affected_rows($conn);
    } else {
        echo "<script>
      alert('email yang anda masukkan tidak valid');
      document.location.href = 'registrasipetani.php'
      </script>";
    }
}
function ubahpetani($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $nomorhp = htmlspecialchars($data["nomorhp"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($password !== $password2) {
            echo "<script>
            alert('Konfirmasi password tidak sesuai');
            </script>";
            return false;
        }
        $gambarsampullama = htmlspecialchars($data["gambarlama"]);

        // cek user memilih gambar baru apa nda
        if ($_FILES['fotoprofil']['error'] === 4) {
            $fotoprofil = $gambarsampullama;
        } else {
            $fotoprofil = uploadfoto();
        }
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $querry = "UPDATE petani SET 
                        nama = '$nama',
                        username ='$username',
                        email = '$email',
                        nomorhp = '$nomorhp',
                        jeniskelamin = '$jeniskelamin',
                        alamat = '$alamat',
                        password ='$password',
                        fotoprofil='$fotoprofil',
                        kabupaten='$kabupaten'
                        
                        WHERE id = $id
        ";
        mysqli_query($conn, $querry);
        return mysqli_affected_rows($conn);
    } else {
        echo "<script>
      alert('email yang anda masukkan tidak valid');
      document.location.href = 'registrasipetani.php'
      </script>";
    }
}

function ubahstatuspetani($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data["id"];

    $status = htmlspecialchars($data["status"]);


    $querry = "UPDATE petani SET               
                    status = '$status'     
                    WHERE id = $id
    ";
    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}


function cari($keyword)
{

    $query = "SELECT * FROM admin
            WHERE 
             nama LIKE '%$keyword%' OR 
             username LIKE '%$keyword%' OR
             nomorhp LIKE '%$keyword%' OR
             email LIKE '%$keyword%' OR
             kabupaten LIKE '%$keyword%'
             "; // Like dengan %cari yang mirip dari depan

    return query($query);
}
function carisales($keyword)
{

    $query = "SELECT * FROM sales
            WHERE 
             nama LIKE '%$keyword%' OR 
             username LIKE '%$keyword%' OR
             perusahaan LIKE '%$keyword%' OR
             nomorhp LIKE '%$keyword%' OR
             email LIKE '%$keyword%'OR
             kabupaten LIKE '%$keyword%'
             "; // Like dengan %cari yang mirip dari depan

    return query($query);
}
function caripetani($keyword)
{

    $query = "SELECT * FROM petani
            WHERE 
             nama LIKE '%$keyword%' OR 
             username LIKE '%$keyword%' OR
             nomorhp LIKE '%$keyword%' OR
             email LIKE '%$keyword%' OR
             status LIKE '%$keyword%'OR
             kabupaten LIKE '%$keyword%'
             "; // Like dengan %cari yang mirip dari depan

    return query($query);
}
function profil($data)
{
    global $conn;
    $username = $data;

    $result = mysqli_query($conn, "SELECT username FROM 
    admin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {

        return $result;
    }
    $result = mysqli_query($conn, "SELECT username FROM 
    sales WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {

        return $result;
    }
    $result = mysqli_query($conn, "SELECT username FROM 
    petani WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {

        return $result;
    }
}
function login($data)
{
    global $conn;
    // mysqli_query($conn,"CREATE VIEW admin as SELECT * FROM 
    // admin");
    // mysqli_query($conn,"CREATE VIEW sales as SELECT * FROM 
    // sales");
    // mysqli_query($conn,"CREATE VIEW petani as SELECT * FROM 
    // petani");

    $username = $data;

    $result = mysqli_query($conn, "SELECT * FROM 
    admin WHERE username = '$username'");
    // //var_dump($result);

    if (mysqli_fetch_assoc($result)) {

        return [$result, "admin"];
    }
    $result = mysqli_query($conn, "SELECT * FROM 
    sales WHERE username = '$username'");
    // //var_dump($result);
    if (mysqli_fetch_assoc($result)) {

        return [$result, "sales"];
    }
    $result = mysqli_query($conn, "SELECT * FROM 
    petani WHERE username = '$username'");
    // //var_dump($result);
    if (mysqli_fetch_assoc($result)) {

        return [$result, "petani"];
    } else {
        echo "<script>
        alert('username tidak terdaftar');
        document.location.href = 'login.php'
        </script>";

        // header("Location: login.php");
        return false;
    }
}
function tambahadmin($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $nomorhp = htmlspecialchars($data["nomorhp"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // cek username sudah ada apa lom
        $result = mysqli_query($conn, "SELECT username FROM 
    admin WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
        alert('username sudah terdaftar');
        </script>";
            return false;
        }
        $result = mysqli_query($conn, "SELECT username FROM 
    sales WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
        alert('username sudah terdaftar');
        </script>";
            return false;
        }
        $result = mysqli_query($conn, "SELECT username FROM 
    petani WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
        alert('username sudah terdaftar');
        </script>";
            return false;
        }

        // cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
        alert('Konfirmasi password tidak sesuai');
        </script>";
            return false;
        }
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambah user baru ke database
        mysqli_query($conn, "INSERT INTO admin
    Values
    ('','$nama','$username','$email','$nomorhp',
    '$jeniskelamin','$alamat','$password','profil.png',$kabupaten)");

        return mysqli_affected_rows($conn);
    } else {
        echo "<script>
      alert('email yang anda masukkan tidak valid');
      document.location.href = 'registrasipetani.php'
      </script>";
    }
}
function tambahsales($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $perusahaan = htmlspecialchars($data["perusahaan"]);
    $email = htmlspecialchars($data["email"]);
    $tanggallahir = htmlspecialchars($data["tanggallahir"]);
    $nomorhp = htmlspecialchars($data["nomorhp"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // cek username sudah ada apa lom
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = mysqli_query($conn, "SELECT username FROM 
        petani WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('username sudah terdaftar');
            </script>";
            return false;
        }
        $result = mysqli_query($conn, "SELECT username FROM 
        sales WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('username sudah terdaftar');
            </script>";
            return false;
        }
        $result = mysqli_query($conn, "SELECT username FROM 
        admin WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('username sudah terdaftar');
            </script>";
            return false;
        }

        // cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
            alert('Konfirmasi password tidak sesuai');
            </script>";
            return false;
        }
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO sales
       Values
       ('','$nama','$username','$perusahaan','$email','$tanggallahir','$nomorhp',
       '$jeniskelamin','$alamat','$password','profil.png',$kabupaten)
       ");
        // tambah user baru ke database
        return mysqli_affected_rows($conn);
    } else {
        echo "<script>
      alert('email yang anda masukkan tidak valid');
      document.location.href = 'tambahsales.php'
      </script>";
    }
}
function tambahpetani($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $nomorhp = htmlspecialchars($data["nomorhp"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // cek username sudah ada apa lom
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = mysqli_query($conn, "SELECT username FROM 
    petani WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('username sudah terdaftar');
            </script>";
            return false;
        }
        $result = mysqli_query($conn, "SELECT username FROM 
        sales WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('username sudah terdaftar');
            </script>";
            return false;
        }
        $result = mysqli_query($conn, "SELECT username FROM 
        admin WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('username sudah terdaftar');
            </script>";
            return false;
        }

        // cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>
            alert('Konfirmasi password tidak sesuai');
            </script>";
            return false;
        }
        // enkripsi password
        $passbaru = $password;
        $password = password_hash($password, PASSWORD_DEFAULT);
        // //var_dump(password_verify($passbaru,$password));

        mysqli_query($conn, "INSERT INTO petani
        Values
        ('','$nama','$username','$email','$nomorhp',
        '$jeniskelamin','$alamat','$password','Tidak Aktif','profil.png',$kabupaten)
        ");
        // tambah user baru ke database
        return mysqli_affected_rows($conn);
    } else {
        echo "<script>
        alert('email yang anda masukkan tidak valid');
        document.location.href = 'registrasipetani.php'
        </script>";
    }
}

function tambahmodul($data)
{
    // vmbil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id_admin = htmlspecialchars($data["id_admin"]);;
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $narasumber = htmlspecialchars($data["narasumber"]);
    $video = htmlspecialchars($data["video"]);
    // upload gambar/modul  

    $gambarsampul = upload();
    if (!$gambarsampul) {
        return false;
    }
    $modul = uploadmodul();
    if (!$gambarsampul) {
        return false;
    }

    mysqli_query($conn, "INSERT INTO modul
   Values
   ('','$judul','$deskripsi','$gambarsampul','$video',
   '$narasumber','$modul','$id_admin')
   ");
    // tambah user baru ke database
    return mysqli_affected_rows($conn);
}
function upload()
{

    $namafile = $_FILES['gambarsampul']['name'];
    $ukuranfile = $_FILES['gambarsampul']['size'];
    $error = $_FILES['gambarsampul']['error'];
    $tmpName = $_FILES['gambarsampul']['tmp_name'];

    if ($error === 4) {
        echo "<script/>
        alert ('pilih gambar terlebih dahulu');
        </script/>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $typegambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $typegambarvalid)) {
        echo "<script/>
        alert ('yang anda upload bukan gambar');
        </script/>";
        return false;
    }
    // cek ukuran 
    if ($ukuranfile > 100000000) {
        echo "<script/>
        alert ('ukuran gambar terlalu besar');
        </script/>";
        return false;
    }
    // lolos pengecaekan gambar , siap diupload
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;
    //var_dump($namafilebaru);
    move_uploaded_file($tmpName, 'modul/sampul/' . $namafilebaru);

    return $namafilebaru;
}
function uploadmodul()
{

    $namafile = $_FILES['modul']['name'];
    $ukuranfile = $_FILES['modul']['size'];
    $error = $_FILES['modul']['error'];
    $tmpName = $_FILES['modul']['tmp_name'];

    if ($error === 4) {
        echo "<script/>
        alert ('pilih modul terlebih dahulu');
        </script/>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $typemodulvalid = ['pdf'];
    $ekstensimodul = explode('.', $namafile);
    $ekstensimodul = strtolower(end($ekstensimodul));
    if (!in_array($ekstensimodul, $typemodulvalid)) {
        echo "<script/>
        alert ('yang anda upload bukan pdf');
        </script/>";
        return false;
    }
    // cek ukuran 
    if ($ukuranfile > 100000000) {
        echo "<script/>
        alert ('ukuran pdf terlalu besar');
        </script/>";
        return false;
    }
    // lolos pengecaekan gambar , siap diupload
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensimodul;
    //var_dump($namafilebaru);
    move_uploaded_file($tmpName, 'modul/pdf/' . $namafilebaru);

    return $namafilebaru;
}
function ubahmodul($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $narasumber = htmlspecialchars($data["narasumber"]);
    $video = htmlspecialchars($data["video"]);
    $id_admin = $data["id_admin"];
    // upload gambar/modul  
    $modullama = htmlspecialchars($data["modullama"]);
    $gambarsampullama = htmlspecialchars($data["gambarlama"]);

    // cek user memilih gambar baru apa nda
    if ($_FILES['gambarsampul']['error'] === 4) {
        $gambarsampul = $gambarsampullama;
    } else {
        $gambarsampul = upload();
    }
    if ($_FILES['modul']['error'] === 4) {
        $modul = $modullama;
    } else {
        $modul = uploadmodul();
    }


    $querry = "UPDATE modul SET 
                    judul = '$judul',
                    deskripsi ='$deskripsi',
                    gambarsampul = '$gambarsampul',
                    video = '$video',
                    narasumber = '$narasumber',
                    modul = '$modul',
                    id_admin = '$id_admin'
                    WHERE id = $id";
    //tambah user baru ke database

    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}
function uploadfoto()
{

    $namafile = $_FILES['fotoprofil']['name'];
    $ukuranfile = $_FILES['fotoprofil']['size'];
    $error = $_FILES['fotoprofil']['error'];
    $tmpName = $_FILES['fotoprofil']['tmp_name'];

    if ($error === 4) {

        return 'profil.png';
    }

    // cek apakah yang diupload adalah gambar
    $typegambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $typegambarvalid)) {
        echo "<script/>
        alert ('yang anda upload bukan gambar');
        </script/>";
        return false;
    }
    // cek ukuran 
    if ($ukuranfile > 100000000) {
        echo "<script/>
        alert ('ukuran gambar terlalu besar');
        </script/>";
        return false;
    }
    // lolos pengecaekan gambar , siap diupload
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;
    //var_dump($namafilebaru);
    move_uploaded_file($tmpName, 'fotoprofil/' . $namafilebaru);

    return $namafilebaru;
}
function uploadgambarpostingan()
{

    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        return $namafilebaru = 'null';
    }

    // cek apakah yang diupload adalah gambar
    $typegambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $typegambarvalid)) {
        echo "<script/>
        alert ('yang anda upload bukan gambar');
        </script/>";
        return false;
    }
    // cek ukuran 
    if ($ukuranfile > 100000000) {
        echo "<script/>
        alert ('ukuran gambar terlalu besar');
        </script/>";
        return false;
    }
    // lolos pengecaekan gambar , siap diupload
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;
    //var_dump($namafilebaru);
    move_uploaded_file($tmpName, 'gambarpostingan/' . $namafilebaru);

    return $namafilebaru;
}

function tambahpostingan($data)
{
    // vmbil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $username = htmlspecialchars($data["username"]);
    $konten = htmlspecialchars($data["konten"]);
    $tanggaldibuat = date("l, d - m - y ");
    // upload gambar/modul  
    $gambar = uploadgambarpostingan();
    if (!$gambar) {
        return false;
    }
    mysqli_query($conn, "INSERT INTO postingan
   Values
   ('','$username','$konten','$gambar','$tanggaldibuat','tampil'
   )");
    // tambah user baru ke database
    return mysqli_affected_rows($conn);
}
function ubahpostingan($data)
{
    // vmbil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $konten = htmlspecialchars($data["konten"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);
    $tanggaldibuat = date("l, d - m - y ");
    // upload gambar/modul  
    // cek user memilih gambar baru apa nda
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = uploadgambarpostingan();
    }
    if (!$gambar) {
        return false;
    }

    // tambah user baru ke database
    $querry = "UPDATE postingan SET 
                    username = '$username',
                    konten ='$konten',
                    gambar = '$gambar',
                    tanggaldibuat = '$tanggaldibuat'
                    WHERE id = $id";
    //tambah user baru ke database
    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}
function ubahkomentar($data, $username2)
{
    // vmbil data dari tiap elemen form
    global $conn;

    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data["id_komentar"];
    //var_dump($id);
    $username = htmlspecialchars($username2);
    $konten = htmlspecialchars($data["konten"]);
    $tanggaldibuat = date("l, d - m - y ");
    // upload gambar/modul  
    // cek user memilih gambar baru apa nda

    // tambah user baru ke database
    $querry = "UPDATE komentar SET 
                    username = '$username',
                    konten ='$konten',
                    tanggal = '$tanggaldibuat'
                    WHERE id_komentar = $id";
    //tambah user baru ke database
    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}
function hidekomentar($data)
{
    // vmbil data dari tiap elemen form
    global $conn;

    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan

    //var_dump($data);
    $id = $data;
    // upload gambar/modul  
    // cek user memilih gambar baru apa nda

    // tambah user baru ke database
    $querry = "UPDATE komentar SET 
                    status = 'tersembunyi'
                    WHERE id_komentar = $id";
    //tambah user baru ke database
    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}
function showkomentar($data)
{
    // vmbil data dari tiap elemen form
    global $conn;

    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan

    //var_dump($data);
    $id = $data;
    // upload gambar/modul  
    // cek user memilih gambar baru apa nda

    // tambah user baru ke database
    $querry = "UPDATE komentar SET 
                    status = 'tampil'
                    WHERE id_komentar = $id";
    //tambah user baru ke database
    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}
function hidepostingan($data)
{
    // vmbil data dari tiap elemen form
    global $conn;

    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data;
    // upload gambar/modul  
    // cek user memilih gambar baru apa nda

    // tambah user baru ke database
    $querry = "UPDATE postingan SET 
                    status = 'tersembunyi'
                    WHERE id = $id";
    //tambah user baru ke database
    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}
function showpostingan($data)
{
    // vmbil data dari tiap elemen form
    global $conn;

    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id = $data;
    // upload gambar/modul  
    // cek user memilih gambar baru apa nda

    // tambah user baru ke database
    $querry = "UPDATE postingan SET 
                    status = 'tampil'
                    WHERE id = $id";
    //tambah user baru ke database
    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}

function tambahkomentar($data, $username2)
{
    // vmbil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $idpostingan = $data["id"];

    $username = htmlspecialchars($username2);
    $konten = htmlspecialchars($data["konten"]);
    $tanggaldibuat = date("l, d - m - y ");
    // upload gambar/modul  

    mysqli_query($conn, "INSERT INTO komentar
   Values
   ('','$idpostingan','$username','$konten','$tanggaldibuat','tampil'
   )");
    // tambah user baru ke database
    return mysqli_affected_rows($conn);
}
// tampilan gambar profil komunitas
function gambarprofilkomunitas($data)
{
    global $conn;
    $username = $data;
    $result = mysqli_query($conn, "SELECT * FROM 
    admin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {

        return [$result, "admin"];
    }
    $result = mysqli_query($conn, "SELECT * FROM 
    sales WHERE username = '$username'");
    // //var_dump($result);
    if (mysqli_fetch_assoc($result)) {

        return [$result, "sales"];
    }
    $result = mysqli_query($conn, "SELECT * FROM 
    petani WHERE username = '$username'");
    // //var_dump($result);
    if (mysqli_fetch_assoc($result)) {

        return [$result, "petani"];
    }
}

function tambahproduk($data)
{
    // vmbil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $namaproduk = htmlspecialchars($data["nama_produk"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $jumlahstok = htmlspecialchars($data["jumlah_stok"]);

    $username = htmlspecialchars($data["username"]);
    // upload gambar/modul  

    $gambarproduk = uploadgambarproduk();
    if (!$gambarproduk) {
        return false;
    }


    mysqli_query($conn, "INSERT INTO produk
   Values
   ('','$namaproduk','$gambarproduk','$deskripsi','$jumlahstok',
   0,'$username')
   ");
    // tambah user baru ke database
    return mysqli_affected_rows($conn);
}

function tambahwishlist($data)
{
    // vmbil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    $id_produk = htmlspecialchars($data["id_produk"]);
    $id_petani = htmlspecialchars($data["id_petani"]);
    $id_sales = htmlspecialchars($data["id_sales"]);

    $result = mysqli_query($conn, "SELECT * FROM 
    wishlistpetani WHERE id_petani=$id_petani AND id_produk = '$id_produk'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('produk sudah ada di wihslist ');
        </script>";

        return false;
    }



    mysqli_query($conn, "INSERT INTO wishlistpetani
   Values
   ('','$id_produk','$id_petani','$id_sales')
   ");
    $querry = "UPDATE produk SET 
    wishlist = +1
    WHERE id_produk = $id_produk";
    //tambah user baru ke database

    mysqli_query($conn, $querry);
    // tambah user baru ke database
    return mysqli_affected_rows($conn);
}


function ubahproduk($data)
{
    // vambil data dari tiap elemen form
    global $conn;
    // html special char agar kode html yang diinputkan tidak berjalan
    // ndak wajib se, cuman buat keamanan
    //var_dump($data);
    $id = $data["id_produk"];
    $namaproduk = htmlspecialchars($data["nama_produk"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $jumlahstok = htmlspecialchars($data["jumlah_stok"]);
    $username = htmlspecialchars($data["username"]);
    // upload gambar/modul  
    $gambarproduklama = htmlspecialchars($data["gambarlama"]);

    // cek user memilih gambar baru apa nda
    if ($_FILES['gambarproduk']['error'] === 4) {
        $gambarproduk = $gambarproduklama;
    } else {
        $gambarproduk = uploadgambarproduk();
    }

    $querry = "UPDATE produk SET 
                    nama_produk = '$namaproduk',
                    deskripsi ='$deskripsi',
                    gambar = '$gambarproduk',
                    jumlah_stok = '$jumlahstok',
                    username = '$username'
                    WHERE id_produk = $id";
    //tambah user baru ke database

    mysqli_query($conn, $querry);
    return mysqli_affected_rows($conn);
}
function uploadgambarproduk()
{

    $namafile = $_FILES['gambarproduk']['name'];
    $ukuranfile = $_FILES['gambarproduk']['size'];
    $error = $_FILES['gambarproduk']['error'];
    $tmpName = $_FILES['gambarproduk']['tmp_name'];

    if ($error === 4) {
        echo "<script/>
        alert ('pilih gambar terlebih dahulu');
        </script/>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $typegambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $typegambarvalid)) {
        echo "<script/>
        alert ('yang anda upload bukan gambar');
        </script/>";
        return false;
    }
    // cek ukuran 
    if ($ukuranfile > 100000000) {
        echo "<script/>
        alert ('ukuran gambar terlalu besar');
        </script/>";
        return false;
    }
    // lolos pengecaekan gambar , siap diupload
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;
    //var_dump($namafilebaru);
    move_uploaded_file($tmpName, 'produk/gambar/' . $namafilebaru);

    return $namafilebaru;
}
