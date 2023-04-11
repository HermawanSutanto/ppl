<?php	
// koneksi database
$conn = mysqli_connect("localhost","root","","ppl");


function query($querry){
    global $conn;
    $result = mysqli_query($conn,$querry);
    $rows=[];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}


function tambahsales($data){
    // vmbil data dari tiap elemen form
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
    $password = htmlspecialchars($data["password"]);
    
    
    $password = password_hash($password,PASSWORD_DEFAULT);
    $querry = "INSERT INTO sales
    Values
    ('','$nama','$username','$perusahaan','$email','$tanggallahir','$nomorhp',
    '$jeniskelamin','$alamat','$password')
    ";
    mysqli_query($conn,$querry);



    // tambah user baru ke database
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM admin1 WHERE id = $id ");
    return mysqli_affected_rows($conn);

}
function hapussales($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM sales WHERE id = $id ");
    return mysqli_affected_rows($conn);

}


function ubah($data){
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
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    $querry = "UPDATE admin1 SET 
                    nama = '$nama',
                    username ='$username',
                    email = '$email',
                    nomorhp = '$nomorhp',
                    jeniskelamin = '$jeniskelamin',
                    alamat = '$alamat',
                    password ='$password'
                    WHERE id = $id
    ";
    if($password!==$password2){
        echo "<script>
        alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;

    }
    // enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);

mysqli_query($conn,$querry);
return mysqli_affected_rows($conn);

}

function ubahsales($data){
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
    $password = htmlspecialchars($data["password"]);

    $querry = "UPDATE sales SET 
                    nama = '$nama',
                    username ='$username',
                    perusahaan ='$perusahaan',
                    email = '$email',
                    tanggallahir ='$tanggallahir',
                    nomorhp = '$nomorhp',
                    jeniskelamin = '$jeniskelamin',
                    alamat = '$alamat',
                    password ='$password'
                    WHERE id = $id
    ";

mysqli_query($conn,$querry);
return mysqli_affected_rows($conn);

}
function cari($keyword){

    $query = "SELECT * FROM admin1
            WHERE 
             nama LIKE '%$keyword%' OR 
             username LIKE '%$keyword%' OR
             nomorhp LIKE '%$keyword%' OR
             email LIKE '%$keyword%'
             ";// Like dengan %cari yang mirip dari depan
    
    return query($query);

}
function carisales($keyword){

    $query = "SELECT * FROM sales
            WHERE 
             nama LIKE '%$keyword%' OR 
             username LIKE '%$keyword%' OR
             perusahaan LIKE '%$keyword%' OR
             nomorhp LIKE '%$keyword%' OR
             email LIKE '%$keyword%'
             ";// Like dengan %cari yang mirip dari depan
    
    return query($query);

}


function registrasi($data){
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
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    // cek username sudah ada apa lom
    $result = mysqli_query($conn,"SELECT username FROM 
    admin1 WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)){
        echo"<script>
        alert('username sudah terdaftar');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if($password!==$password2){
        echo "<script>
        alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;

    }
    // enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);

    // tambah user baru ke database
    mysqli_query($conn,"INSERT INTO admin1
    Values
    ('','$nama','$username','$email','$nomorhp',
    '$jeniskelamin','$alamat','$password')");

    return mysqli_affected_rows($conn);

}
function registrasisales($data){
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
    $password = htmlspecialchars($data["password"]);
    $password2 = htmlspecialchars($data["password2"]);
    
    // cek username sudah ada apa lom
    
    $result = mysqli_query($conn,"SELECT username FROM 
    sales WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo"<script>
        alert('username sudah terdaftar');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if($password!==$password2){
        echo "<script>
        alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;

    }
    // enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);
   
   mysqli_query($conn,"INSERT INTO sales
   Values
   ('','$nama','$username','$perusahaan','$email','$tanggallahir','$nomorhp',
   '$jeniskelamin','$alamat','$password')
   ");
    // tambah user baru ke database
    return mysqli_affected_rows($conn);

    

}


?>